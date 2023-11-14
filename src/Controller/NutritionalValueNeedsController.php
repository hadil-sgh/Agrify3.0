<?php

namespace App\Controller;

use App\Entity\NutritionalValueNeeds;
use App\Form\NutritionalValueNeeds1Type;
use App\Repository\NutritionalValueNeedsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/nutritional/value/needs')]
class NutritionalValueNeedsController extends AbstractController
{
    #[Route('/', name: 'app_nutritional_value_needs_index', methods: ['GET'])]
    public function index(NutritionalValueNeedsRepository $nutritionalValueNeedsRepository): Response
    {
        return $this->render('nutritional_value_needs/index.html.twig', [
            'nutritional_value_needs' => $nutritionalValueNeedsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_nutritional_value_needs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nutritionalValueNeed = new NutritionalValueNeeds();
        $form = $this->createForm(NutritionalValueNeeds1Type::class, $nutritionalValueNeed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($nutritionalValueNeed);
            $entityManager->flush();

            return $this->redirectToRoute('app_nutritional_value_needs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nutritional_value_needs/new.html.twig', [
            'nutritional_value_need' => $nutritionalValueNeed,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nutritional_value_needs_show', methods: ['GET'])]
    public function show(NutritionalValueNeeds $nutritionalValueNeed): Response
    {
        return $this->render('nutritional_value_needs/show.html.twig', [
            'nutritional_value_need' => $nutritionalValueNeed,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_nutritional_value_needs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NutritionalValueNeeds $nutritionalValueNeed, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NutritionalValueNeeds1Type::class, $nutritionalValueNeed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_nutritional_value_needs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nutritional_value_needs/edit.html.twig', [
            'nutritional_value_need' => $nutritionalValueNeed,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nutritional_value_needs_delete', methods: ['POST'])]
    public function delete(Request $request, NutritionalValueNeeds $nutritionalValueNeed, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nutritionalValueNeed->getId(), $request->request->get('_token'))) {
            $entityManager->remove($nutritionalValueNeed);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_nutritional_value_needs_index', [], Response::HTTP_SEE_OTHER);
    }
}
