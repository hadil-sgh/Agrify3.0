<?php

namespace App\Controller;

use App\Entity\AnimalBatch;
use App\Form\ExcelImportType;
use App\Repository\AnimalBatchRepository;
use Doctrine\ORM\EntityManagerInterface;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use ZipArchive;

#[Route('/animal/batch')]
class AnimalBatchController extends AbstractController
{
    #[Route('/', name: 'app_animal_batch_index', methods: ['GET'])]
    public function index(AnimalBatchRepository $animalBatchRepository): Response
    {
        return $this->render('animal_batch/index.html.twig', [
            'animal_batches' => $animalBatchRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_animal_batch_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExcelImportType::class);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $file = $form->get('file')->getData();
    
            // Check file type
            if ($file->getClientOriginalExtension() !== 'xlsx') {
                $this->addFlash('error', 'Invalid file type. Please upload an Excel file.');
                return $this->redirectToRoute('your_failure_route'); // Replace with your actual route
            }
    
            try {
                // Process the Excel file
                $this->processExcelFile($file, $entityManager);
    
                $this->addFlash('success', 'Data imported successfully.');
    
                return $this->redirectToRoute('app_animal_batch_index', [], Response::HTTP_SEE_OTHER);
            } catch (\Exception $e) {
                $this->addFlash('error', 'Error processing the Excel file: ' . $e->getMessage());
                return $this->redirectToRoute('your_failure_route'); // Replace with your actual route
            }
        }
    
        return $this->renderForm('animal_batch/new.html.twig', [
            'form' => $form,
        ]);
    }
    
    private function processExcelFile($file, EntityManagerInterface $entityManager)
    {
        try {
            $spreadsheet = IOFactory::load($file);
            $sheet = $spreadsheet->getActiveSheet();
    
            // Iterate through rows and add data to the database
            foreach ($sheet->getRowIterator() as $row) {
                $cellIterator = $row->getCellIterator();
                $cellIterator->setIterateOnlyExistingCells(false); // Iterate over all cells, even if they are empty
    
                $data = [];
                foreach ($cellIterator as $cell) {
                    $data[] = $cell->getValue();
                }
    
                // Assuming your data array has the same order as your entity properties
                [
                    $especeAnimalBatch,
                    $sexeRation,
                    $poidsmaxRation,
                    $poidsminRation,
                    $ageAnimalBatch,
                    $nombreAnimalBatch
                ] = $data;
    
                $animalBatch = new AnimalBatch();
                $animalBatch->setEspeceAnimalBatch($especeAnimalBatch)
                    ->setSexeRation($sexeRation)
                    ->setPoidsmaxRation($poidsmaxRation)
                    ->setPoidsminRation($poidsminRation)
                    ->setAgeAnimalBatch($ageAnimalBatch)
                    ->setNombreAnimalBatch($nombreAnimalBatch);
    
                $entityManager->persist($animalBatch);
            }
    
            $entityManager->flush();
        } catch (\Exception $e) {
            throw new \Exception('Error processing the Excel file: ' . $e->getMessage());
        }
    }
    
    #[Route('/{id}', name: 'app_animal_batch_show', methods: ['GET'])]
    public function show(AnimalBatch $animalBatch): Response
    {
        return $this->render('animal_batch/show.html.twig', [
            'animal_batch' => $animalBatch,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_animal_batch_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AnimalBatch $animalBatch, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(ExcelImportType::class, $animalBatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_animal_batch_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('animal_batch/edit.html.twig', [
            'animal_batch' => $animalBatch,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_animal_batch_delete', methods: ['POST'])]
    public function delete(Request $request, AnimalBatch $animalBatch, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$animalBatch->getId(), $request->request->get('_token'))) {
            $entityManager->remove($animalBatch);
            $entityManager->flush();
        }
        return $this->redirectToRoute('app_animal_batch_index', [], Response::HTTP_SEE_OTHER);
    }
}
