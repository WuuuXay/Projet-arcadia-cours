<?php

namespace App\Service;

use App\Entity\Horaire;
use Doctrine\ORM\EntityManagerInterface;

class HoraireService
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function getHoraires(): array
    {
        return $this->entityManager->getRepository(Horaire::class)->findAll();
    }
}
