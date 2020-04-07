<?php

namespace App\Repository;

use App\Entity\FormWidget;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FormWidget|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormWidget|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormWidget[]    findAll()
 * @method FormWidget[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormWidgetRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormWidget::class);
    }

    // /**
    //  * @return FormWidget[] Returns an array of FormWidget objects
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
    public function findOneBySomeField($value): ?FormWidget
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
