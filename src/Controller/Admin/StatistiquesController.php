<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\AnimalRepository;
use Symfony\Component\HttpFoundation\Response;

class StatistiquesController extends AbstractController
{
    private AnimalRepository $animalRepository;

    public function __construct(AnimalRepository $animalRepository)
    {
        $this->animalRepository = $animalRepository;
    }

    #[Route('/admin/statistiques', name: 'admin_statistiques')]
    public function index(): Response
    {
        $totalAnimaux = $this->animalRepository->count([]);
        $especes = $this->animalRepository->findDistinctSpecies();

        $animaux = $this->animalRepository->findAll();
        $labels = [];
        $data = [];

        foreach ($animaux as $animal) {
            $labels[] = $animal->getNom();
            $data[] = $animal->getVues();
        }

        return $this->render('admin/statistiques.html.twig', [
            'totalAnimaux' => $totalAnimaux,
            'especes' => $especes,
            'labels' => json_encode($labels),  
            'data' => json_encode($data),      
        ]);
    }
}
