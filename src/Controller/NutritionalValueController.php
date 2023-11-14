<?php

namespace App\Controller;

use App\Entity\NutritionalValue;
use App\Form\NutritionalValue1Type;
use App\Repository\NutritionalValueRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/nutritional/value')]
class NutritionalValueController extends AbstractController
{
    #[Route('/', name: 'app_nutritional_value_index', methods: ['GET'])]
    public function index(NutritionalValueRepository $nutritionalValueRepository): Response
    {
        return $this->render('nutritional_value/index.html.twig', [
            'nutritional_values' => $nutritionalValueRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_nutritional_value_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $nutritionalValue = new NutritionalValue();
        $form = $this->createForm(NutritionalValue1Type::class, $nutritionalValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($nutritionalValue);
            $entityManager->flush();

            return $this->redirectToRoute('app_nutritional_value_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nutritional_value/new.html.twig', [
            'nutritional_value' => $nutritionalValue,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nutritional_value_show', methods: ['GET'])]
    public function show(NutritionalValue $nutritionalValue): Response
    {
        return $this->render('nutritional_value/show.html.twig', [
            'nutritional_value' => $nutritionalValue,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_nutritional_value_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, NutritionalValue $nutritionalValue, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NutritionalValue1Type::class, $nutritionalValue);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_nutritional_value_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('nutritional_value/edit.html.twig', [
            'nutritional_value' => $nutritionalValue,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_nutritional_value_delete', methods: ['POST'])]
    public function delete(Request $request, NutritionalValue $nutritionalValue, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$nutritionalValue->getId(), $request->request->get('_token'))) {
            $entityManager->remove($nutritionalValue);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_nutritional_value_index', [], Response::HTTP_SEE_OTHER);
    }
}
