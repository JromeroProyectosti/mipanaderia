<?php

namespace App\Repository;

use App\Entity\MovimientoTipo;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method MovimientoTipo|null find($id, $lockMode = null, $lockVersion = null)
 * @method MovimientoTipo|null findOneBy(array $criteria, array $orderBy = null)
 * @method MovimientoTipo[]    findAll()
 * @method MovimientoTipo[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovimientoTipoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, MovimientoTipo::class);
    }

    // /**
    //  * @return MovimientoTipo[] Returns an array of MovimientoTipo objects
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
    public function findOneBySomeField($value): ?MovimientoTipo
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
