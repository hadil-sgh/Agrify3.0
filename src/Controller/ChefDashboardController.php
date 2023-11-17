<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/ChefDashboard')]
class ChefDashboardController extends AbstractController
{
    #[Route('/', name: 'app_ChefDashboard_index', methods: ['GET'])]
    public function index(): Response
    {
        $user = $this->getUser();

        return $this->render('Chef/index.html.twig', [
            'user' => $user,
        ]);
    }
}
