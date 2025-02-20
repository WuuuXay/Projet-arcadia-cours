<?php

namespace App\Controller;

use App\Repository\EnclosRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class JungleController extends AbstractController
{
    #[Route('/jungle', name: 'app_jungle')]
public function index(EnclosRepository $enclosRepository)
{
    $enclos = $enclosRepository->findBy(['zone' => 'jungle']);

    return $this->render('zones/jungle.html.twig', [
        'enclos' => $enclos, 
    ]);
}
}