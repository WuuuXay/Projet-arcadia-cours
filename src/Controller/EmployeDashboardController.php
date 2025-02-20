<?php

namespace App\Controller;

use App\Repository\AvisRepository;
use App\Repository\AnimalRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
    use Symfony\Bundle\SecurityBundle\Attribute\IsGranted;

class EmployeDashboardController extends AbstractController
{

    #[Route('/employe/dashboard', name: 'employe_dashboard')]
    #[IsGranted('ROLE_EMPLOYE')]
    public function employeDashboard(AvisRepository $avisRepository, AnimalRepository $animalRepository): Response
    {
        $avis = $avisRepository->findBy(['valide' => false]);
        $animaux = $animalRepository->findAll();
    
        return $this->render('dashboard/employe.html.twig', [
            'avis' => $avis,
            'animaux' => $animaux
        ]);
    }    
}

