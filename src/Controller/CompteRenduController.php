<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\CompteRendu;
use App\Form\CompteRenduType;
use App\Repository\CompteRenduRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class CompteRenduController extends AbstractController
{
    #[Route('/veterinaire/compte-rendu/{id}', name: 'veterinaire_compte_rendu')]
    public function ajouterCompteRendu(
        Animal $animal,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response {
        $compteRendu = new CompteRendu();
        $compteRendu->setAnimal($animal);
    
        $form = $this->createForm(CompteRenduType::class, $compteRendu);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $compteRendu->setDate(new \DateTime());
            $entityManager->persist($compteRendu);
            $entityManager->flush();
    
            $this->addFlash('success', 'Compte rendu ajouté avec succès !');
            return $this->redirectToRoute('veterinaire_dashboard_index');
        }
    
        return $this->render('veterinaire/ajouter_compte_rendu.html.twig', [
            'form' => $form->createView(), 
            'animal' => $animal
        ]);
    }
}
