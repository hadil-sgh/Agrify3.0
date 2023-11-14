<?php

namespace App\Controller;

use App\Entity\Gestation;
use App\Form\Gestation1Type;
use App\Repository\GestationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/gestation')]
class GestationController extends AbstractController
{
    #[Route('/', name: 'app_gestation_index', methods: ['GET'])]
    public function index(GestationRepository $gestationRepository): Response
    {
        return $this->render('gestation/index.html.twig', [
            'gestations' => $gestationRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_gestation_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $gestation = new Gestation();
        $form = $this->createForm(Gestation1Type::class, $gestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($gestation);
            $entityManager->flush();

            return $this->redirectToRoute('app_gestation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('gestation/new.html.twig', [
            'gestation' => $gestation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_gestation_show', methods: ['GET'])]
    public function show(Gestation $gestation): Response
    {
        return $this->render('gestation/show.html.twig', [
            'gestation' => $gestation,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_gestation_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Gestation $gestation, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(Gestation1Type::class, $gestation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_gestation_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('gestation/edit.html.twig', [
            'gestation' => $gestation,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_gestation_delete', methods: ['POST'])]
    public function delete(Request $request, Gestation $gestation, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$gestation->getId(), $request->request->get('_token'))) {
            $entityManager->remove($gestation);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_gestation_index', [], Response::HTTP_SEE_OTHER);
    }
}
