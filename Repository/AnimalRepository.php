<?php

namespace App\Repository;

use App\Entity\Animal;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AnimalRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Animal::class);
    }

    public function findByEnclos(int $enclosId): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.enclos = :enclosId')
            ->setParameter('enclosId', $enclosId)
            ->orderBy('a.nom', 'ASC')
            ->getQuery()
            ->getResult();
    }
    
    public function findDistinctSpecies(): array
    {
        return $this->createQueryBuilder('a')
            ->select('DISTINCT a.race') 
            ->getQuery()
            ->getResult();
    }

}
