<?php

namespace App\Controller;


use App\Repository\AnimalRepository;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GestionAnimalController extends AbstractController
{
    #[Route('/gestion/animal', name: 'app_gestion_animal')]
    public function index(Request $request, AnimalRepository $animalRepository): Response
    {
               $searchQuery = $request->query->get('search');
               $sortDirection = $request->query->get('sort', 'asc');
       
               if ($searchQuery) {
                   $animals = $animalRepository->findBySpecies($searchQuery);
               } else {
                   $animals = $animalRepository->findAll();
               }
       
               usort($animals, function ($a, $b) use ($sortDirection) {
                   $compare = strnatcmp($a->getEspece(), $b->getEspece());
                   return ($sortDirection === 'asc') ? $compare : -$compare;
               });

        return $this->render('gestion_animal/index.html.twig', [
            'animals' => $animals,
        ]);
    }
}
