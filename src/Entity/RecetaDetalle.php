<?php

namespace App\Entity;

use App\Repository\RecetaDetalleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecetaDetalleRepository::class)
 */
class RecetaDetalle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=ProductoUnidad::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $unidad;

    /**
     * @ORM\ManyToOne(targetEntity=Receta::class, inversedBy="recetaDetalles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $receta;

    /**
     * @ORM\ManyToOne(targetEntity=Producto::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $producto;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cantidad;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cantUnidad;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isPrincipal;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUnidad(): ?ProductoUnidad
    {
        return $this->unidad;
    }

    public function setUnidad(?ProductoUnidad $unidad): self
    {
        $this->unidad = $unidad;

        return $this;
    }

    public function getReceta(): ?Receta
    {
        return $this->receta;
    }

    public function setReceta(?Receta $receta): self
    {
        $this->receta = $receta;

        return $this;
    }

    public function getProducto(): ?Producto
    {
        return $this->producto;
    }

    public function setProducto(?Producto $producto): self
    {
        $this->producto = $producto;

        return $this;
    }

    public function getCantidad(): ?float
    {
        return $this->cantidad;
    }

    public function setCantidad(?float $cantidad): self
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    public function getCantUnidad(): ?float
    {
        return $this->cantUnidad;
    }

    public function setCantUnidad(?float $cantUnidad): self
    {
        $this->cantUnidad = $cantUnidad;

        return $this;
    }

    public function getIsPrincipal(): ?bool
    {
        return $this->isPrincipal;
    }

    public function setIsPrincipal(bool $isPrincipal): self
    {
        $this->isPrincipal = $isPrincipal;

        return $this;
    }
}
