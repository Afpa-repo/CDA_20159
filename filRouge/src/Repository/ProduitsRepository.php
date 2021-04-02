<?php

namespace App\Repository;

use App\Entity\Produits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Produits|null find($id, $lockMode = null, $lockVersion = null)
 * @method Produits|null findOneBy(array $criteria, array $orderBy = null)
 * @method Produits[]    findAll()
 * @method Produits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProduitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Produits::class);
    }

    /**
    * @return Produits[] Returns an array of Produits objects
    */

    public function findAllDESC()
    {


        return $this->createQueryBuilder('produits')
            ->orderBy('produits.id', 'DESC')
            ->setMaxResults(2)
            ->getQuery()
            ->getResult()
        ;
    }

// fonction pour récupérer les produits par sous catégories
    public function findBySousCat($value)
    {
        return $this->createQueryBuilder('SousCatParId')
            ->andWhere('SousCatParId.IdSousCat = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getResult()
            ;
    }


}
