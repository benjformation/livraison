<?php

namespace App\Repository;

use App\Entity\TypeDepot;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method TypeDepot|null find($id, $lockMode = null, $lockVersion = null)
 * @method TypeDepot|null findOneBy(array $criteria, array $orderBy = null)
 * @method TypeDepot[]    findAll()
 * @method TypeDepot[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypeDepotRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, TypeDepot::class);
    }

    // /**
    //  * @return TypeDepot[] Returns an array of TypeDepot objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?TypeDepot
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
