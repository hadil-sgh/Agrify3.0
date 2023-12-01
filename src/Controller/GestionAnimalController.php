<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionAnimalController extends AbstractController
{
    #[Route('/gestion/animal', name: 'app_gestion_animal')]
    public function index(): Response
    {
        return $this->render('gestion_animal/index.html.twig', [
            'controller_name' => 'GestionAnimalController',
        ]);
    }
}
