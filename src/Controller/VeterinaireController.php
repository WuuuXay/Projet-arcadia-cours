<?php

namespace App\Controller;

use App\Entity\Animal;
use App\Entity\CompteRendu;
use App\Form\AnimalFormType;
use App\Form\CompteRenduType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/veterinaire/dashboard', name: 'veterinaire_dashboard_')]
class VeterinaireController extends AbstractController
{
    #[Route('/', name: 'index')]
    public function dashboard(EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_VETERINAIRE');

        $animaux = $entityManager->getRepository(Animal::class)->findAll();

        return $this->render('veterinaire/dashboard.html.twig', [
            'animaux' => $animaux,
        ]);
    }

    #[Route('/ajout', name: 'ajout_animal')]
    public function ajoutAnimal(Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_VETERINAIRE');

        $animal = new Animal();
        $form = $this->createForm(AnimalFormType::class, $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($animal);
            $entityManager->flush();

            return $this->redirectToRoute('veterinaire_dashboard_index');
        }

        return $this->render('veterinaire/ajout.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/edit/{id}', name: 'edit')]
    public function editAnimal(Animal $animal, Request $request, EntityManagerInterface $entityManager): Response
    {
        $this->denyAccessUnlessGranted('ROLE_VETERINAIRE');

        $form = $this->createForm(AnimalFormType::class, $animal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();
            return $this->redirectToRoute('veterinaire_dashboard_index');
        }

        return $this->render('veterinaire/edit.html.twig', [
            'form' => $form->createView(),
            'animal' => $animal,
        ]);
    }

    #[Route('/compte-rendu/{id}', name: 'veterinaire_compte_rendu')]
    public function ajouterCompteRendu(Request $request, EntityManagerInterface $entityManager, Animal $animal): Response
    {
        $compteRendu = new CompteRendu();
        $compteRendu->setAnimal($animal);
    
        $form = $this->createForm(CompteRenduType::class, $compteRendu);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($compteRendu);
            $entityManager->flush();
    
            return $this->redirectToRoute('veterinaire_dashboard_index');
        }
    
        return $this->render('veterinaire/compte_rendu.html.twig', [
            'form' => $form->createView(),
            'animal' => $animal
        ]);
    }
}
