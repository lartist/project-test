<?php

namespace App\Repository;

use App\Entity\Project;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Project|null find($id, $lockMode = null, $lockVersion = null)
 * @method Project|null findOneBy(array $criteria, array $orderBy = null)
 * @method Project[]    findAll()
 * @method Project[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProjectRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Project::class);
    }

     /**
      * @return Project[] Returns an array of Project objects
      */
    public function findByParams(array $params = [])
    {
        $qb = $this->createQueryBuilder('p')
            ->leftJoin('p.filledFields', 'ff')
            ->leftJoin('ff.field', 'f')
            ;

        foreach ($params as $key => $value) {

            $qb
                ->andWhere('f.label = :' . $key)
                ->setParameter($key , $key)
                ->andWhere('ff.content = :' . $value)
                ->setParameter($value , $value);

        }

        return $qb
            ->getQuery()
            ->getResult()
        ;
    }


    /*
    public function findOneBySomeField($value): ?Project
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
