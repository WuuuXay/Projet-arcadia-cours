<?php

namespace App\Repository;

use App\Entity\Habitat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Habitat>
 */
class HabitatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Habitat::class);
    }

    /**
     * Récupère tous les habitats d'une zone donnée
     */
    public function findByZone(string $zone)
    {
        return $this->createQueryBuilder('h')
            ->where('h.zone = :zone')
            ->setParameter('zone', $zone)
            ->getQuery()
            ->getResult();
    }
}
