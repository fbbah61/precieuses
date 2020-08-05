<?php

namespace App\Repository;

use App\Entity\Stampwish;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Stampwish|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stampwish|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stampwish[]    findAll()
 * @method Stampwish[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StampwishRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Stampwish::class);
    }

    // /**
    //  * @return Stampwish[] Returns an array of Stampwish objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Stampwish
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
