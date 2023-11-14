<?php

namespace App\Controller;

use App\Entity\NutritionalNeeds;
use App\Form\NutritionalNeedsType;
use App\Repository\NutritionalNeedsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/nutritional/needs')]
class NutritionalNeedsController extends AbstractController
{
    #[Route('/', name: 'app_nutritional_needs_index', methods: ['GET'])]
    public function index(NutritionalNeedsRepository $nutritionalNeedsRepository): Response
    {
        return $this->render('nutritional_needs/index.html.twig', [
            'nutritional_needs' => $nutritionalNeedsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_nutritional_needs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nutritionalNeed = new NutritionalNeeds();
        $form = $this->createForm(NutritionalNeedsType::class, $nutritionalNeed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($nutritionalNeed);
            $entityManager->flush();

            return $this->redirectToRoute('app_nutritional_needs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nutritional_needs/new.html.twig', [
            'nutritional_need' => $nutritionalNeed,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nutritional_needs_show', methods: ['GET'])]
    public function show(NutritionalNeeds $nutritionalNeed): Response
    {
        return $this->render('nutritional_needs/show.html.twig', [
            'nutritional_need' => $nutritionalNeed,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_nutritional_needs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NutritionalNeeds $nutritionalNeed, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NutritionalNeedsType::class, $nutritionalNeed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_nutritional_needs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nutritional_needs/edit.html.twig', [
            'nutritional_need' => $nutritionalNeed,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nutritional_needs_delete', methods: ['POST'])]
    public function delete(Request $request, NutritionalNeeds $nutritionalNeed, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nutritionalNeed->getId(), $request->request->get('_token'))) {
            $entityManager->remove($nutritionalNeed);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_nutritional_needs_index', [], Response::HTTP_SEE_OTHER);
    }
}
