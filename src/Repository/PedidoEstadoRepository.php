<?php

namespace App\Repository;

use App\Entity\PedidoEstado;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PedidoEstado|null find($id, $lockMode = null, $lockVersion = null)
 * @method PedidoEstado|null findOneBy(array $criteria, array $orderBy = null)
 * @method PedidoEstado[]    findAll()
 * @method PedidoEstado[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PedidoEstadoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PedidoEstado::class);
    }

    // /**
    //  * @return PedidoEstado[] Returns an array of PedidoEstado objects
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
    public function findOneBySomeField($value): ?PedidoEstado
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
