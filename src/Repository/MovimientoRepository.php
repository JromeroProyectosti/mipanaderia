<?php

namespace App\Repository;

use App\Entity\Folio;
use App\Entity\Movimiento;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Movimiento|null find($id, $lockMode = null, $lockVersion = null)
 * @method Movimiento|null findOneBy(array $criteria, array $orderBy = null)
 * @method Movimiento[]    findAll()
 * @method Movimiento[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MovimientoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Movimiento::class);
    }

    /**
     *
     */
    public function findByPers(int $empresa,
                               int $usuario=null,
                               int $folio=null,
                               int $cuenta=null, 
                               String $fecha=null, 
                               String $clienteProvedor = null,
                               int $tipoDocumento=null,
                               bool $estado=true )
    {
        $query=$this->createQueryBuilder('m')
        ->andWhere("m.empresa=".$empresa);

        if($usuario!=null){
            $query->andWhere("m.usuarioIngreso=".$usuario);
        }
        if($folio!=null){
            $query->andWhere("m.folio=".$folio);
        }
        
        if($estado){
            $query->andWhere("m.estado=true");

        }else{
            $query->andWhere("m.estado=false");

        }
        
        if($cuenta!=null){
            $query->andWhere("m.cuenta=".$cuenta);
        }
        if($tipoDocumento!=null){
            $query->andWhere("m.movimientoTipo=".$tipoDocumento);
        }

        if($clienteProvedor!=null){
            $query->join("m.clienteProveedor",'cp');
            $query->andWhere("cp.nombre like '%".$clienteProvedor."%' ");
        }        


        return $query->getQuery()
        ->getResult()
    ;
    }

    // /**
    //  * @return Movimiento[] Returns an array of Movimiento objects
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
    public function findOneBySomeField($value): ?Movimiento
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
