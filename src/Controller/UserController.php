<?php

namespace App\Controller;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class UserController extends AbstractController
{
    #[Route('/create-employe', name: 'create_employe')]
    public function createEmploye(EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $user->setUsername('employe1');
        $user->setFirstName('Pierre');
        $user->setLastName('Durand');
        $user->setRoles(['ROLE_EMPLOYE']);

        $hashedPassword = $passwordHasher->hashPassword($user, 'password123');
        $user->setPassword($hashedPassword);

        $em->persist($user);
        $em->flush();

        return new Response('Employé créé avec succès !');
    }

    #[Route('/create-admin', name: 'create_admin')]
    public function createAdmin(EntityManagerInterface $em, UserPasswordHasherInterface $passwordHasher): Response
    {
        $user = new User();
        $user->setUsername('admin1');
        $user->setFirstName('Alice');
        $user->setLastName('Martin');
        $user->setRoles(['ROLE_ADMIN']);
    
        $hashedPassword = $passwordHasher->hashPassword($user, 'adminpassword');
        $user->setPassword($hashedPassword);
    
        $em->persist($user);
        $em->flush();
    
        return new Response('Administrateur créé avec succès !');
    }
    

}


