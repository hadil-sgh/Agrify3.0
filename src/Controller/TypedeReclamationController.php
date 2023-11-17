<?php

namespace App\Controller;

use App\Entity\TypedeReclamation;
use App\Form\TypedeReclamationType;
use App\Repository\TypedeReclamationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/typede/reclamation')]
class TypedeReclamationController extends AbstractController
{
    #[Route('/', name: 'app_typede_reclamation_index', methods: ['GET'])]
    public function index(TypedeReclamationRepository $typedeReclamationRepository): Response
    {
        return $this->render('typede_reclamation/index.html.twig', [
            'typede_reclamations' => $typedeReclamationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_typede_reclamation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $typedeReclamation = new TypedeReclamation();
        $form = $this->createForm(TypedeReclamationType::class, $typedeReclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($typedeReclamation);
            $entityManager->flush();

            return $this->redirectToRoute('app_typede_reclamation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typede_reclamation/new.html.twig', [
            'typede_reclamation' => $typedeReclamation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_typede_reclamation_show', methods: ['GET'])]
    public function show(TypedeReclamation $typedeReclamation): Response
    {
        return $this->render('typede_reclamation/show.html.twig', [
            'typede_reclamation' => $typedeReclamation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_typede_reclamation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, TypedeReclamation $typedeReclamation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(TypedeReclamationType::class, $typedeReclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_typede_reclamation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('typede_reclamation/edit.html.twig', [
            'typede_reclamation' => $typedeReclamation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_typede_reclamation_delete', methods: ['POST'])]
    public function delete(Request $request, TypedeReclamation $typedeReclamation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typedeReclamation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($typedeReclamation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_typede_reclamation_index', [], Response::HTTP_SEE_OTHER);
    }
}
