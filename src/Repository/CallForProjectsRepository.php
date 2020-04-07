<?php

namespace App\Repository;

use App\Entity\CallForProjects;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CallForProjects|null find($id, $lockMode = null, $lockVersion = null)
 * @method CallForProjects|null findOneBy(array $criteria, array $orderBy = null)
 * @method CallForProjects[]    findAll()
 * @method CallForProjects[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CallForProjectsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CallForProjects::class);
    }

    // /**
    //  * @return CallForProjects[] Returns an array of CallForProjects objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?CallForProjects
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
