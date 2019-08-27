<?php

namespace App\Repository;

use App\Entity\Idee;
use App\Entity\Categorie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;

/**
 * @method Idee|null find($id, $lockMode = null, $lockVersion = null)
 * @method Idee|null findOneBy(array $criteria, array $orderBy = null)
 * @method Idee[]    findAll()
 * @method Idee[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IdeeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Idee::class);
    }

    // /**
    //  * @return Idee[] Returns an array of Idee objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Idee
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */

    public function findAllByPublished()
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.ispublished = :val')
            ->setParameter('val', 1)
            ->orderBy('i.id', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }

}
