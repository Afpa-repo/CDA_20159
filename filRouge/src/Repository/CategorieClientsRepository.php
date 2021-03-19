<?php

namespace App\Repository;

use App\Entity\CategorieClients;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method CategorieClients|null find($id, $lockMode = null, $lockVersion = null)
 * @method CategorieClients|null findOneBy(array $criteria, array $orderBy = null)
 * @method CategorieClients[]    findAll()
 * @method CategorieClients[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CategorieClientsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, CategorieClients::class);
    }

    // /**
    //  * @return CategorieClients[] Returns an array of CategorieClients objects
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
    public function findOneBySomeField($value): ?CategorieClients
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
