<?php

namespace App\Repository;

use App\Entity\ProductoTipo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductoTipo|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductoTipo|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductoTipo[]    findAll()
 * @method ProductoTipo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductoTipoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductoTipo::class);
    }

    // /**
    //  * @return ProductoTipo[] Returns an array of ProductoTipo objects
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
    public function findOneBySomeField($value): ?ProductoTipo
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
