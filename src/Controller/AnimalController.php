<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Form\Animal1Type;
use App\Repository\AnimalRepository;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Form\ExcelImportType;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/animal')]
class AnimalController extends AbstractController
{
    #[Route('/', name: 'app_animal_index', methods: ['GET'])]
    public function index(Request $request, AnimalRepository $animalRepository): Response
    {
               $searchQuery = $request->query->get('search');
               $sortDirection = $request->query->get('sort', 'asc');
       
               if ($searchQuery) {
                   $animals = $animalRepository->findBySpecies($searchQuery);
               } else {
                   $animals = $animalRepository->findAll();
               }
       
               usort($animals, function ($a, $b) use ($sortDirection) {
                   $compare = strnatcmp($a->getEspece(), $b->getEspece());
                   return ($sortDirection === 'asc') ? $compare : -$compare;
               });

        return $this->render('animal/index.html.twig', [
            'animals' => $animals,
        ]);
    }

    #[Route('/new', name: 'app_animal_new', methods: ['GET', 'POST'])]
    public function newAnimal(Request $request, EntityManagerInterface $entityManager, MailerInterface $mailer): Response
    {
        $form = $this->createForm(ExcelImportType::class);
        $form->handleRequest($request);
        
        if($form->isSubmitted() && $form->isValid()){
            $file = $form->get('file')->getData();

            if ($file->getClientOriginalExtension() !== 'xlsx') {
                $this->addFlash('error', 'Invalid file type. Please upload an Excel file.');
                return $this->redirectToRoute('app_animal_batch_index');
            }

            try {
                $this->processExcelFile($file, $entityManager, $mailer);

                $this->addFlash('success', 'Data imported successfully.');

                return $this->redirectToRoute('app_animal_index', [], Response::HTTP_SEE_OTHER);
            } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
                $this->addFlash('error', sprintf('Error processing the Excel file: %s', $e->getMessage()));
                return $this->redirectToRoute('app_animal_index');
            }
        }
        return $this->renderForm('animal/new.html.twig', [
            'form' => $form,
        ]);
     }
     private function processExcelFile($file, EntityManagerInterface $entityManager, MailerInterface $mailer)
     {
         try {
             $spreadsheet = IOFactory::load($file);
             $sheet = $spreadsheet->getActiveSheet();
 
             foreach ($sheet->getRowIterator() as $row) {
                 $cellIterator = $row->getCellIterator();
                 $cellIterator->setIterateOnlyExistingCells(false);
 
                 $data = [];
                 foreach ($cellIterator as $cell) {
                     $data[] = $cell->getValue();
                 }
 
                 [
                     $espece,
                     $sexe,
                     $poids,
                     $unitAnimal,
                     $age
                 ] = $data;
 
                 $animal = new Animal();
                 $animal->setEspece($espece)
                     ->setSexe($sexe)
                     ->setPoids($poids)
                     ->setUnitAnimal($unitAnimal)
                     ->setAge($age);
                     
 
                 $entityManager->persist($animal);
             }
 
             $entityManager->flush();
 
             $this->sendAnimalAddedNotification($mailer);
         } catch (\PhpOffice\PhpSpreadsheet\Reader\Exception $e) {
             throw $e;
         }
     }
 
     private function sendAnimalAddedNotification(MailerInterface $mailer)
     {
         $email = $this->createAnimalAddedEmail();
         $mailer->send($email);
     }
 
     
     private function createAnimalAddedEmail(): Email
     {
         return (new Email())
             ->from('achahlaou.nour@gmail.com')
             ->to('tbagheiyth@gmail.com')
             ->subject('New Animals Added')
             ->text('A new animal has been added by the chef nour.');
     }

    #[Route('/{id}', name: 'app_animal_show', methods: ['GET'])]
    public function show(Animal $animal): Response
    {
        return $this->render('animal/show.html.twig', [
            'animal' => $animal,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_animal_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Animal $animal, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Animal1Type::class, $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_animal_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('animal/edit.html.twig', [
            'animal' => $animal,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_animal_delete', methods: ['POST'])]
    public function delete(Request $request, Animal $animal, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$animal->getId(), $request->request->get('_token'))) {
            $entityManager->remove($animal);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_animal_index', [], Response::HTTP_SEE_OTHER);
    }
}
