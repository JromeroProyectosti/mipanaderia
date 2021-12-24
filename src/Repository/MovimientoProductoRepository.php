<?php

namespace App\Repository;

use App\Entity\MovimientoProducto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MovimientoProducto|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovimientoProducto|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovimientoProducto[]    findAll()
 * @method MovimientoProducto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovimientoProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovimientoProducto::class);
    }

    // /**
    //  * @return MovimientoProducto[] Returns an array of MovimientoProducto objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?MovimientoProducto
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}
