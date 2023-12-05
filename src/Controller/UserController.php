<?php

    namespace App\Controller;
    use Symfony\Component\Mailer\MailerInterface;
    use Twig\Environment as TwigEnvironment;
    use Symfony\Component\Mime\Email;
    use Knp\Snappy\Pdf;
    use App\Entity\User;
    use App\Form\User1Type;
    use App\Repository\UserRepository;
    use Doctrine\ORM\EntityManagerInterface;
    use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
    use Symfony\Component\HttpFoundation\Request;
    use Symfony\Component\HttpFoundation\Response;
    use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
    use Symfony\Component\HttpFoundation\JsonResponse;



    #[Route('/user')]
    class UserController extends AbstractController 
    {        private $twig;
        private UserPasswordEncoderInterface $passwordEncoder;
        private Pdf $pdfService;


        private $mailer;

        


        public function __construct(MailerInterface $mailer, TwigEnvironment $twig, UserPasswordEncoderInterface $passwordEncoder,Pdf $pdfService)
        {
            $this->passwordEncoder = $passwordEncoder;
            $this->pdfService = $pdfService;
            $this->mailer = $mailer;
            $this->twig = $twig;
        }



        #[Route('/', name: 'app_user_index', methods: ['GET'])]
        public function index(Request $request, UserRepository $userRepository): Response
        {

            $searchQuery = $request->query->get('search');
            $sortDirection = $request->query->get('sort', 'asc');

    
            if ($searchQuery) {
                $users = $userRepository->findByUserNom($searchQuery);
            } else {
                $users = $userRepository->findAll();
            }

            usort($users, function ($a, $b) use ($sortDirection) {
                $compare = strnatcmp($a->getUserRole(), $b->getUserRole());
                return ($sortDirection === 'asc') ? $compare : -$compare;
            });

            return $this->render('user/index.html.twig', [
                'users' => $users,
            ]);
        }

        #[Route('/new', name: 'app_user_new', methods: ['GET', 'POST'])]
        public function new(Request $request, EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder): Response
        {
            $user = new User();
            $form = $this->createForm(User1Type::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                // Get the plaintext password before encoding
                $plainPassword = $user->getPassword();
    
                // Encode the password
                $encodedPassword = $this->passwordEncoder->encodePassword($user, $plainPassword);
                $user->setPassword($encodedPassword);
    
                $entityManager->persist($user);
                $entityManager->flush();
    
                $this->addFlash('success', 'User created successfully.');
    
                // Send the personalized welcome email
                $this->sendWelcomeEmail($user, $plainPassword);
                return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->renderForm('user/new.html.twig', [
                'user' => $user,
                'form' => $form,
            ]);
        }

        #[Route('/{user_id}', name: 'app_user_show', methods: ['GET'])]
        public function show(User $user): Response
        {
            return $this->render('user/show.html.twig', [
                'user' => $user,
            ]);
        }

        #[Route('/{user_id}/edit', name: 'app_user_edit', methods: ['GET', 'POST'])]
        public function edit(Request $request, User $user, EntityManagerInterface $entityManager): Response
        {
            $form = $this->createForm(User1Type::class, $user);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
            
             $plainPassword = $user->getPassword();
    
             $encodedPassword = $this->passwordEncoder->encodePassword($user, $plainPassword);
             $user->setPassword($encodedPassword);

             $entityManager->persist($user);
             $entityManager->flush();

             $this->addFlash('success', 'User created successfully.');

             $this->sendWelcomeEmaill($user, $plainPassword);   

                return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
            }

            return $this->renderForm('user/edit.html.twig', [
                'user' => $user,
                'form' => $form,
            ]);
        }

        #[Route('/{user_id}', name: 'app_user_delete', methods: ['POST'])]
        public function delete(Request $request, User $user, EntityManagerInterface $entityManager): Response
        {
            if ($this->isCsrfTokenValid('delete'.$user->getUserId(), $request->request->get('_token'))) {
                $entityManager->remove($user);
                $entityManager->flush();
            
            }
        
            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }


        private function sendWelcomeEmail(User $user, string $plainPassword)
        {
            $email = (new Email())
                ->from('tbagheiyth@gmail.com')
                ->to($user->getUserEmail())
                ->subject('Welcome to Agrify!')
                ->html(
                    $this->twig->render(
                        'email/welcome.html.twig',
                        ['user' => $user, 'plainPassword' => $plainPassword]
                    )
                );
    
            $this->mailer->send($email);
        }

        private function sendWelcomeEmaill(User $user, string $plainPassword)
        {
            $email = (new Email())
                ->from('tbagheiyth@gmail.com')
                ->to($user->getUserEmail())
                ->subject('Some Changes happened !!!')
                ->html(
                    $this->twig->render(
                        'email/update.html.twig',
                        ['user' => $user, 'plainPassword' => $plainPassword]
                    )
                );
    
            $this->mailer->send($email);
        }

        #[Route('/print/{user_id}', name: 'app_user_print', methods: ['GET'])]

        public function print(User $user, Request $request): Response
        {
            $userData = [
                'user' => $user,
            ];
        
            $html = $this->renderView('user/print.html.twig', $userData);
        
            $filename = 'user_' . $user->getUserId() . '.pdf';
        
            return new Response(
                $this->pdfService->getOutputFromHtml($html),
                200,
                [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="' . $filename . '"',
                ]
            );
        }
        
        #[Route('/search/{user_nom}', name: 'search_user', methods: ['GET'])]
        public function showByUserNom(UserRepository $userRepository, string $userNom): Response
        {
            dump($userNom); 
            $user = $userRepository->findByUserNom($userNom);
        
            if (!$user) {
                throw $this->createNotFoundException('User not found');
            }
        
            return $this->render('user/show1.html.twig', [
                'user' => $user,
            ]);

        }
        

        
    }