<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/AdminDashboard')]
class AdminDahboardController extends AbstractController
{
    #[Route('/', name: 'app_AdminDashboard_index', methods: ['GET'])]
    public function index(): Response
    {
        $user = $this->getUser();

        return $this->render('AdminDahboard/index.html.twig', [
            'user' => $user,
        ]);
    }
}
