<?php

namespace App\Repository;

use App\Entity\Receta;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Receta|null find($id, $lockMode = null, $lockVersion = null)
 * @method Receta|null findOneBy(array $criteria, array $orderBy = null)
 * @method Receta[]    findAll()
 * @method Receta[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RecetaRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Receta::class);
    }

    /**
     *
     */
    public function findByPers(int $empresa,
                               int $usuario=null,
                               String $fecha=null, 
                               String $nombre=null,
                               bool $estado=true )
    {
        $query=$this->createQueryBuilder('r')
        ->andWhere("r.empresa=".$empresa);

        if($usuario!=null){
            $query->andWhere("r.usuarioIngreso=".$usuario);
        }
        if($nombre!=null){
            $query->andWhere("r.nombre=".$nombre);
        }

        if($fecha!=null){
            $query->andWhere($fecha);
        }
        
        if($estado){
            $query->andWhere("r.estado=true");

        }else{
            $query->andWhere("r.estado=false");

        }

        return $query->getQuery()
        ->getResult()
    ;
    }

    // /**
    //  * @return Receta[] Returns an array of Receta objects
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
    public function findOneBySomeField($value): ?Receta
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
