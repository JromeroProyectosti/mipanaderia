<?php

namespace App\Repository;

use App\Entity\RecetaDetalle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RecetaDetalle|null find($id, $lockMode = null, $lockVersion = null)
 * @method RecetaDetalle|null findOneBy(array $criteria, array $orderBy = null)
 * @method RecetaDetalle[]    findAll()
 * @method RecetaDetalle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecetaDetalleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RecetaDetalle::class);
    }

    // /**
    //  * @return RecetaDetalle[] Returns an array of RecetaDetalle objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RecetaDetalle
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
