<?php

namespace App\Controller;

use App\Entity\Avis;
use App\Form\AvisType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AvisController extends AbstractController
{
    #[Route('/contact', name: 'app_contact')]
    public function index(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avis = new Avis();
        $form = $this->createForm(AvisType::class, $avis);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avis);
            $entityManager->flush();
    
            $this->addFlash('success', 'Votre avis a bien été enregistré.');
            return $this->redirectToRoute('app_contact');
        }
    
        $avisList = $entityManager->getRepository(Avis::class)->findAll();
    
        return $this->render('pages/contact.html.twig', [
            'form' => $form->createView(),
            'avisList' => $avisList
        ]);
    }
}