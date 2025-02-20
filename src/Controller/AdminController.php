<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\CompteRendu;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[Route('/admin')]
#[IsGranted('ROLE_ADMIN')] 
class AdminController extends AbstractController
{
    #[Route('/admin', name: 'admin_home')]
    public function index(): Response
    {
        return $this->render('admin/index.html.twig', [
            'controller_name' => 'AdminController',
        ]);
    }

    #[Route('/assign-role/{id}/{role}', name: 'assign_role')]
    public function assignRole(User $user, string $role, EntityManagerInterface $entityManager): Response
    {
        if (!in_array($role, ['ROLE_ADMIN', 'ROLE_USER', 'ROLE_EMPLOYE', 'ROLE_VETERINAIRE'])) {
            throw $this->createNotFoundException('Rôle invalide');
        }

        $user->setRoles([$role]);
        $entityManager->flush();

        $this->addFlash('success', "Le rôle {$role} a été attribué à {$user->getEmail()} !");
        return $this->redirectToRoute('admin_home');
    }

    #[Route('/comptes-rendus', name: 'admin_comptes_rendus')]
    public function comptesRendus(Request $request, EntityManagerInterface $entityManager): Response
    {
        $date = $request->query->get('date');
        $animal = $request->query->get('animal');

        $query = $entityManager->getRepository(CompteRendu::class)->createQueryBuilder('cr');

        if ($date) {
            $query->andWhere('cr.date = :date')->setParameter('date', $date);
        }

        if ($animal) {
            $query->andWhere('cr.animal = :animal')->setParameter('animal', $animal);
        }

        $comptesRendus = $query->getQuery()->getResult();

        return $this->render('admin/comptes_rendus.html.twig', [
            'comptes_rendus' => $comptesRendus,
        ]);
    }
}
