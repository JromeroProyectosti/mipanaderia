<?php

namespace App\Repository;

use App\Entity\SolicitudRecetaDetalle;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SolicitudRecetaDetalle|null find($id, $lockMode = null, $lockVersion = null)
 * @method SolicitudRecetaDetalle|null findOneBy(array $criteria, array $orderBy = null)
 * @method SolicitudRecetaDetalle[]    findAll()
 * @method SolicitudRecetaDetalle[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolicitudRecetaDetalleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SolicitudRecetaDetalle::class);
    }

    // /**
    //  * @return SolicitudRecetaDetalle[] Returns an array of SolicitudRecetaDetalle objects
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
    public function findOneBySomeField($value): ?SolicitudRecetaDetalle
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
