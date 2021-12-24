<?php

namespace App\Repository;

use App\Entity\ProductoUnidad;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductoUnidad|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductoUnidad|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductoUnidad[]    findAll()
 * @method ProductoUnidad[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductoUnidadRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductoUnidad::class);
    }

    // /**
    //  * @return ProductoUnidad[] Returns an array of ProductoUnidad objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductoUnidad
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
