<?php

namespace App\Repository;

use App\Entity\GoodiesLine;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method GoodiesLine|null find($id, $lockMode = null, $lockVersion = null)
 * @method GoodiesLine|null findOneBy(array $criteria, array $orderBy = null)
 * @method GoodiesLine[]    findAll()
 * @method GoodiesLine[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GoodiesLineRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, GoodiesLine::class);
    }

    // /**
    //  * @return GoodiesLine[] Returns an array of GoodiesLine objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('g.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?GoodiesLine
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
