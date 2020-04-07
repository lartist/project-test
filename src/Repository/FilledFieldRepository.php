<?php

namespace App\Repository;

use App\Entity\FilledField;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FilledField|null find($id, $lockMode = null, $lockVersion = null)
 * @method FilledField|null findOneBy(array $criteria, array $orderBy = null)
 * @method FilledField[]    findAll()
 * @method FilledField[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FilledFieldRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FilledField::class);
    }

    // /**
    //  * @return FilledField[] Returns an array of FilledField objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?FilledField
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
