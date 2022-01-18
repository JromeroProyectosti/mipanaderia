<?php

namespace App\Repository;

use App\Entity\SolicitudPedido;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SolicitudPedido|null find($id, $lockMode = null, $lockVersion = null)
 * @method SolicitudPedido|null findOneBy(array $criteria, array $orderBy = null)
 * @method SolicitudPedido[]    findAll()
 * @method SolicitudPedido[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SolicitudPedidoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SolicitudPedido::class);
    }

    // /**
    //  * @return SolicitudPedido[] Returns an array of SolicitudPedido objects
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
    public function findOneBySomeField($value): ?SolicitudPedido
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
