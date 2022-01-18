<?php

namespace App\Repository;

use App\Entity\Pedido;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Pedido|null find($id, $lockMode = null, $lockVersion = null)
 * @method Pedido|null findOneBy(array $criteria, array $orderBy = null)
 * @method Pedido[]    findAll()
 * @method Pedido[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PedidoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Pedido::class);
    }

     public function findByPers(int $empresa,
                               int $usuario=null,
                               String $fecha=null, 
                               String $nombreCliente=null,
                               int $folio=null,
                               object $estado=null)
    {
        $query=$this->createQueryBuilder('p')
        ->join('p.cliente','c')
        ->andWhere("p.empresa=".$empresa);

        if($usuario!=null){
            $query->andWhere("p.usuarioIngreso=".$usuario);
        }
        if($nombreCliente!=null){
            $query->andWhere("c.nombre=".$nombreCliente);
        }
        if($folio!=null){
            $query->andWhere("p.folio=".$folio);
        }

        if($fecha!=null){
            $query->andWhere($fecha);
        }
        
        if($estado){
            $query->andWhere("p.estado=true");

        }else{
            $query->andWhere("r.estado=false");

        }

        return $query->getQuery()
        ->getResult()
    ;
    }

    // /**
    //  * @return Pedido[] Returns an array of Pedido objects
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
    public function findOneBySomeField($value): ?Pedido
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
