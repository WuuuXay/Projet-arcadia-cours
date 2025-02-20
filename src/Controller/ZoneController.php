<?php

namespace App\Controller;

use App\Entity\Zone;
use App\Repository\ZoneRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ZoneController extends AbstractController
{
    #[Route('/zones', name: 'app_zones')]
    public function index(ZoneRepository $zoneRepository): Response
    {
        $zones = $zoneRepository->findAll();

        return $this->render('pages/zones.html.twig', [
            'zones' => $zones,
        ]);
    }

    #[Route('/zone/{id}', name: 'app_zone')]
    public function show(Zone $zone): Response
    {
        return $this->render('zones/zones.html.twig', [
            'zone' => $zone,
        ]);
    }
}
