<?php

namespace App\Controller;

use App\Entity\Ration;
use App\Form\RationType;
use App\Repository\RationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ration')]
class RationController extends AbstractController
{
    #[Route('/', name: 'app_ration_index', methods: ['GET'])]
    public function index(RationRepository $rationRepository): Response
    {
        return $this->render('ration/index.html.twig', [
            'rations' => $rationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_ration_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $ration = new Ration();
        $form = $this->createForm(RationType::class, $ration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($ration);
            $entityManager->flush();

            return $this->redirectToRoute('app_ration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ration/new.html.twig', [
            'ration' => $ration,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ration_show', methods: ['GET'])]
    public function show(Ration $ration): Response
    {
        return $this->render('ration/show.html.twig', [
            'ration' => $ration,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_ration_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Ration $ration, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(RationType::class, $ration);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_ration_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('ration/edit.html.twig', [
            'ration' => $ration,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_ration_delete', methods: ['POST'])]
    public function delete(Request $request, Ration $ration, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ration->getId(), $request->request->get('_token'))) {
            $entityManager->remove($ration);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_ration_index', [], Response::HTTP_SEE_OTHER);
    }
}
