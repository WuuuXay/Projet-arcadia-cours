<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class AlimentationController extends AbstractController
{
    #[Route('/ajouter-alimentation', name: 'ajouter_alimentation', methods: ['POST'])]
    public function ajouterAlimentation(Request $request): Response
    {
        // Traitement de l'ajout d'alimentation
        return new Response('Alimentation ajoutée !');
    }
}
