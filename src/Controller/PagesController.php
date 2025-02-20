<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    #[Route('/zones', name: 'app_zones')]
    public function zones(): Response
    {
        return $this->render('pages/zones.html.twig');
    }

    #[Route('/services', name: 'app_services')]
    public function services(): Response
    {
        return $this->render('pages/services.html.twig');
    }

    #[Route('/services-veterinaires', name: 'app_services_veterinaire')]
    public function servicesVeterinaire(): Response
    {
        return $this->render('pages/services_veterinaire.html.twig');
    }
    
    #[Route('/marais', name: 'app_marais')]
    public function marais(): Response
    {
        return $this->render('zones/marais.html.twig');
    }

    #[Route('/jungle', name: 'app_jungle')]
    public function jungle(): Response
    {
        return $this->render('zones/jungle.html.twig');
    }

    #[Route('/savane', name: 'app_savane')]
    public function savane(): Response
    {
        return $this->render('zones/savane.html.twig');
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(): Response
    {
        return $this->render('pages/contact.html.twig');
    }

    #[Route('/informations', name: 'app_info')]
    public function info(): Response
    {
        return $this->render('pages/info.html.twig');
    }

    #[Route('/veterinaire', name: 'app_veterinaire')]
    public function veterinaire(): Response
    {
        return $this->render('veterinaire/dashboard.html.twig');
    }

}