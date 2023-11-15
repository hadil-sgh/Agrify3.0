<?php

namespace App\Controller;

use App\Entity\AnimalBatch;
use App\Form\AnimalBatch1Type;
use App\Repository\AnimalBatchRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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
        $animalBatch = new AnimalBatch();
        $form = $this->createForm(AnimalBatch1Type::class, $animalBatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($animalBatch);
            $entityManager->flush();

            return $this->redirectToRoute('app_animal_batch_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('animal_batch/new.html.twig', [
            'animal_batch' => $animalBatch,
            'form' => $form,
        ]);
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
        $form = $this->createForm(AnimalBatch1Type::class, $animalBatch);
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
