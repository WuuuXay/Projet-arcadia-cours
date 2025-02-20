<?php

namespace App\Controller;

use App\Repository\HoraireRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HoraireController extends AbstractController
{
    #[Route('/horaires', name: 'app_horaires')]
    public function index(HoraireRepository $horaireRepository): Response
    {
        $horaires = $horaireRepository->findAll();

        foreach ($horaires as $horaire) {
            if ($horaire->getHeureOuverture() === null) {
                $horaire->setHeureOuverture(null); // Garde bien NULL
            }
            if ($horaire->getHeureFermeture() === null) {
                $horaire->setHeureFermeture(null);
            }
        }

        return $this->render('horaires/index.html.twig', [
            'horaires' => $horaires,
        ]);
    }
}
