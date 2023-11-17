<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/VeterinaireDashboard')]
class VeterinaireDashboardController extends AbstractController
{
    #[Route('/', name: 'app_VeterinaireDashboard_index', methods: ['GET'])]
    public function index(): Response
    {
        $user = $this->getUser();

        return $this->render('veterinaire/index.html.twig', [
            'user' => $user,
        ]);
    }
}
