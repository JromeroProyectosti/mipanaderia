<?php

namespace App\Repository;

use App\Entity\PedidoMedida;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method PedidoMedida|null find($id, $lockMode = null, $lockVersion = null)
 * @method PedidoMedida|null findOneBy(array $criteria, array $orderBy = null)
 * @method PedidoMedida[]    findAll()
 * @method PedidoMedida[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PedidoMedidaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, PedidoMedida::class);
    }

    // /**
    //  * @return PedidoMedida[] Returns an array of PedidoMedida objects
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
    public function findOneBySomeField($value): ?PedidoMedida
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
