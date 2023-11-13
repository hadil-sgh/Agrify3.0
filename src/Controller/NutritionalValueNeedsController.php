<?php

namespace App\Controller;

use App\Entity\NutritionalValueNeeds;
use App\Form\NutritionalValueNeedsType;
use App\Repository\NutritionalValueNeedsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/nutrition/value/needs')]
class NutritionalValueNeedsController extends AbstractController
{
    #[Route('/', name: 'app_nutrition_value_needs_index', methods: ['GET'])]
    public function index(NutritionalValueNeedsRepository $NutritionalValueNeedsRepository): Response
    {
        return $this->render('nutrition_value_needs/index.html.twig', [
            'nutrition_value_needs' => $NutritionalValueNeedsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_nutrition_value_needs_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nutritionValueNeed = new NutritionalValueNeeds();
        $form = $this->createForm(NutritionalValueNeedsType::class, $nutritionValueNeed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($nutritionValueNeed);
            $entityManager->flush();

            return $this->redirectToRoute('app_nutrition_value_needs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nutrition_value_needs/new.html.twig', [
            'nutrition_value_need' => $nutritionValueNeed,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nutrition_value_needs_show', methods: ['GET'])]
    public function show(NutritionalValueNeeds $nutritionValueNeed): Response
    {
        return $this->render('nutrition_value_needs/show.html.twig', [
            'nutrition_value_need' => $nutritionValueNeed,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_nutrition_value_needs_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NutritionalValueNeeds $nutritionValueNeed, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NutritionalValueNeedsType::class, $nutritionValueNeed);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_nutrition_value_needs_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nutrition_value_needs/edit.html.twig', [
            'nutrition_value_need' => $nutritionValueNeed,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nutrition_value_needs_delete', methods: ['POST'])]
    public function delete(Request $request, NutritionalValueNeeds $nutritionValueNeed, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nutritionValueNeed->getId(), $request->request->get('_token'))) {
            $entityManager->remove($nutritionValueNeed);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_nutrition_value_needs_index', [], Response::HTTP_SEE_OTHER);
    }
}
