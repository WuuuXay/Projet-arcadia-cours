<?php

namespace App\Controller;

use App\Repository\EnclosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MaraisController extends AbstractController
{
    #[Route('/marais', name: 'app_marais')]
    public function index(EnclosRepository $enclosRepository): Response
    {
        $enclos = $enclosRepository->findBy(['zone' => 'marais']);

        return $this->render('zones/marais.html.twig', [
            'enclos' => $enclos,
        ]);
    }
}
