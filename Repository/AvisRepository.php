<?php

namespace App\Repository;

use App\Entity\Avis;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Avis>
 *
 * @method Avis|null find($id, $lockMode = null, $lockVersion = null)
 * @method Avis|null findOneBy(array $criteria, array $orderBy = null)
 * @method Avis[]    findAll()
 * @method Avis[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AvisRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Avis::class);
    }

    /**
     * Récupère les avis non validés
     *
     * @return Avis[]
     */
    public function findNonValides(): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.valide = :valide')
            ->setParameter('valide', false)
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }

    /**
     * Récupère les avis validés
     *
     * @return Avis[]
     */
    public function findValides(): array
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.valide = :valide')
            ->setParameter('valide', true)
            ->orderBy('a.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
