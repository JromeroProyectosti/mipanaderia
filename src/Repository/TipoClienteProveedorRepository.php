<?php

namespace App\Repository;

use App\Entity\TipoClienteProveedor;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method TipoClienteProveedor|null find($id, $lockMode = null, $lockVersion = null)
 * @method TipoClienteProveedor|null findOneBy(array $criteria, array $orderBy = null)
 * @method TipoClienteProveedor[]    findAll()
 * @method TipoClienteProveedor[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TipoClienteProveedorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TipoClienteProveedor::class);
    }

    // /**
    //  * @return TipoClienteProveedor[] Returns an array of TipoClienteProveedor objects
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
    public function findOneBySomeField($value): ?TipoClienteProveedor
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
