<?php

namespace App\Controller;

use App\Repository\HabitatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HabitatController extends AbstractController
{
    #[Route('/zones/jungle', name: 'app_jungle')]
    public function jungle(HabitatRepository $habitatRepository): Response
    {
        $habitats = $habitatRepository->findBy(['zone' => 'jungle']);
    
        return $this->render('zones/jungle.html.twig', [
            'habitats' => $habitats
        ]);
    }
}
