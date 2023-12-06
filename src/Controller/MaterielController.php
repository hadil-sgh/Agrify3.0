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
use Knp\Snappy\Pdf;
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

            $twilioSid = 'ACe058792ac5c1c947260765c684419c1f';
            $twilioAuthToken = '297e45f41d975e3e4ae47f4574fee565';
            $twilioPhoneNumber = '+19299305820';

            $to = '+21655040677';

            $message = 'Materiel with ID ' . $materiel->getId() . ' has been updated!'; // Customize the message as needed

            $client = new Client($twilioSid, $twilioAuthToken);

            $client->messages->create(
                $to,
                [
                    'from' => $twilioPhoneNumber,
                    'body' => $message,
                ]
            );

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

    /*
    #[Route('/{id}/print-pdf', name: 'app_materiel_print_pdf', methods: ['GET'])]
    public function printPdf(Request $request, Pdf $pdf, Materiel $materiel): Response
    {

        $materialDetails = [
            'id' => $materiel->getId(),
            'type' => $materiel->getType(),
            'etat' => $materiel->getEtat(),
            'capaciteMasse' => $materiel->getCapaciteMasse(),
            'capaciteVolume' => $materiel->getCapaciteVolume(),
            'prix' => $materiel->getPrix(),

        ];


        $htmlContent = $this->renderView('materiel/print_pdf.html.twig', [
            'materiel' => $materialDetails,
        ]);

        // Geration de pdf
        $pdfFile = $pdf->getOutputFromHtml($htmlContent);

        //
        $response = new Response($pdfFile);
        $response->headers->set('Content-Type', 'application/pdf');
        $response->headers->set('Content-Disposition', 'inline; filename="materiel_details.pdf"');

        return $response;
    }*/
}
