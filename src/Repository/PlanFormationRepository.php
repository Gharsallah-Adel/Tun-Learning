<?php

namespace App\Repository;

use App\Entity\PlanFormation;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PlanFormation|null find($id, $lockMode = null, $lockVersion = null)
 * @method PlanFormation|null findOneBy(array $criteria, array $orderBy = null)
 * @method PlanFormation[]    findAll()
 * @method PlanFormation[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PlanFormationRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PlanFormation::class);
    }

    // /**
    //  * @return PlanFormation[] Returns an array of PlanFormation objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?PlanFormation
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
