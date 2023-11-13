<?php

namespace App\Controller;

use App\Entity\AnimalBatch;
use App\Form\AnimalBatchType;
use App\Repository\AnimalBatchRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/AnimalBatch')]
class AnimalBatchController extends AbstractController
{
    #[Route('/', name: 'app_AnimalBatch_index', methods: ['GET'])]
    public function index(AnimalBatchRepository $AnimalBatchRepository): Response
    {
        return $this->render('AnimalBatch/index.html.twig', [
            'AnimalBatchs' => $AnimalBatchRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_AnimalBatch_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $AnimalBatch = new AnimalBatch();
        $form = $this->createForm(AnimalBatchType::class, $AnimalBatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($AnimalBatch);
            $entityManager->flush();

            return $this->redirectToRoute('app_AnimalBatch_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('AnimalBatch/new.html.twig', [
            'AnimalBatch' => $AnimalBatch,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_AnimalBatch_show', methods: ['GET'])]
    public function show(AnimalBatch $AnimalBatch): Response
    {
        return $this->render('AnimalBatch/show.html.twig', [
            'AnimalBatch' => $AnimalBatch,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_AnimalBatch_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AnimalBatch $AnimalBatch, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AnimalBatchType::class, $AnimalBatch);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_AnimalBatch_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('AnimalBatch/edit.html.twig', [
            'AnimalBatch' => $AnimalBatch,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_AnimalBatch_delete', methods: ['POST'])]
    public function delete(Request $request, AnimalBatch $AnimalBatch, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$AnimalBatch->getId(), $request->request->get('_token'))) {
            $entityManager->remove($AnimalBatch);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_AnimalBatch_index', [], Response::HTTP_SEE_OTHER);
    }
}
