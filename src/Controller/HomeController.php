<?php

namespace App\Controller;

use App\Repository\HoraireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(HoraireRepository $horaireRepository): Response
    {
        $horaires = $horaireRepository->findAll();

        return $this->render('home/index.html.twig', [
            'horaires' => $horaires,
        ]);
    }
}