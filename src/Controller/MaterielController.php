<?php

namespace App\Controller;

use App\Entity\Materiel;
use App\Form\MaterielType;
use App\Repository\MaterielRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\SmsService;
use Twilio\Rest\Client;



#[Route('/materiel')]
class MaterielController extends AbstractController
{

    #[Route('/', name: 'app_materiel_index', methods: ['GET'])]
    public function index(MaterielRepository $materielRepository): Response
    {
        $materielCount = $materielRepository->count([]);
        $averagePrice = $materielRepository->getAveragePrice();

        return $this->render('materiel/index.html.twig', [
            'materiels' => $materielRepository->findAll(),
            'materielCount' => $materielCount,
            'averagePrice' => $averagePrice,
        ]);
    }




    #[Route('/new', name: 'app_materiel_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $materiel = new Materiel();
        $form = $this->createForm(MaterielType::class, $materiel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($materiel);
            $entityManager->flush();

            return $this->redirectToRoute('app_materiel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('materiel/new.html.twig', [
            'materiel' => $materiel,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_materiel_show', methods: ['GET'])]
    public function show(Materiel $materiel): Response
    {
        return $this->render('materiel/show.html.twig', [
            'materiel' => $materiel,
        ]);
    }
/*
    #[Route('/{id}/edit', name: 'app_materiel_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Materiel $materiel, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MaterielType::class, $materiel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_materiel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('materiel/edit.html.twig', [
            'materiel' => $materiel,
            'form' => $form,
        ]);
    }
*/

    #[Route('/{id}/edit', name: 'app_materiel_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Materiel $materiel, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(MaterielType::class, $materiel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Twilio credentials
            $twilioSid = 'ACe058792ac5c1c947260765c684419c1f'; // Replace with your actual Twilio Account SID
            $twilioAuthToken = '297e45f41d975e3e4ae47f4574fee565'; // Replace with your actual Twilio Auth Token
            $twilioPhoneNumber = '+19299305820'; // Replace with your actual Twilio phone number

            // Recipient's phone number
            $to = '+21655040677'; // Replace with the recipient's phone number

            // Message content
            $message = 'Materiel with ID ' . $materiel->getId() . ' has been updated!'; // Customize the message as needed

            // Create Twilio client
            $client = new Client($twilioSid, $twilioAuthToken);

            // Send SMS
            $client->messages->create(
                $to,
                [
                    'from' => $twilioPhoneNumber,
                    'body' => $message,
                ]
            );

            // Perform the flush after sending the SMS
            $entityManager->flush();

            return $this->redirectToRoute('app_materiel_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('materiel/edit.html.twig', [
            'materiel' => $materiel,
            'form' => $form,
        ]);
    }

    /**
     * Compare original and updated data to check if there are changes.
     */
    private function materielHasChanges(array $originalData, Materiel $updatedMateriel): bool
    {
        foreach ($originalData as $property => $originalValue) {
            // Skip any properties you don't want to compare
            if ($property === 'id') {
                continue;
            }

            // Check if the property has changed
            if ($originalValue !== $updatedMateriel->{'get' . ucfirst($property)}()) {
                return true;
            }
        }

        return false;
    }
    #[Route('/{id}', name: 'app_materiel_delete', methods: ['POST'])]
    public function delete(Request $request, Materiel $materiel, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$materiel->getId(), $request->request->get('_token'))) {
            $entityManager->remove($materiel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_materiel_index', [], Response::HTTP_SEE_OTHER);
    }
}
