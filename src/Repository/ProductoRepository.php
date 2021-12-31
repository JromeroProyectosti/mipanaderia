<?php

namespace App\Repository;

use App\Entity\Producto;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Producto|null find($id, $lockMode = null, $lockVersion = null)
 * @method Producto|null findOneBy(array $criteria, array $orderBy = null)
 * @method Producto[]    findAll()
 * @method Producto[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductoRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Producto::class);
    }

    /**
     * Busqueda de producto, si el codigo existe retorna false, si el codigo no existe retornara true
     * @param int $empresa
     * @param int $productoTipo (1: Materia Prima, 2: Producto Terminado)
     * @param string $codigo
     * @return bool
     */
    public function existeCodigo(int $empresa,int $productoTipo,String $codigo): bool
    {


        $query = $this->createQueryBuilder('p')
            ->andWhere('p.empresa = :empresa')
            ->andWhere('p.productoTipo= :tipo')
            ->andWhere('p.codigo= :codigo')
            ->andWhere('p.estado=1')
            ->setParameter('empresa', $empresa)
            ->setParameter('tipo', $productoTipo)
            ->setParameter('codigo', $codigo)
            ->orderBy('p.id', 'ASC')
            ->getQuery()
            ->getOneOrNullResult()
        ;
        if($query==null){
            return true;
        }else{
            return false;
        }
    }
    // /**
    //  * @return Producto[] Returns an array of Producto objects
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
    public function findOneBySomeField($value): ?Producto
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
