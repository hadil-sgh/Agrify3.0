<?php

namespace App\Controller;

use App\Entity\Newborns;
use App\Form\NewbornsType;
use App\Repository\NewbornsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/newborns')]
class NewbornsController extends AbstractController
{
    #[Route('/', name: 'app_newborns_index', methods: ['GET'])]
    public function index(NewbornsRepository $newbornsRepository): Response
    {
        return $this->render('newborns/index.html.twig', [
            'newborns' => $newbornsRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_newborns_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $newborn = new Newborns();
        $form = $this->createForm(NewbornsType::class, $newborn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($newborn);
            $entityManager->flush();

            return $this->redirectToRoute('app_newborns_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('newborns/new.html.twig', [
            'newborn' => $newborn,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_newborns_show', methods: ['GET'])]
    public function show(Newborns $newborn): Response
    {
        return $this->render('newborns/show.html.twig', [
            'newborn' => $newborn,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_newborns_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Newborns $newborn, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(NewbornsType::class, $newborn);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_newborns_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('newborns/edit.html.twig', [
            'newborn' => $newborn,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_newborns_delete', methods: ['POST'])]
    public function delete(Request $request, Newborns $newborn, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$newborn->getId(), $request->request->get('_token'))) {
            $entityManager->remove($newborn);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_newborns_index', [], Response::HTTP_SEE_OTHER);
    }
}
