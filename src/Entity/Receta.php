<?php

namespace App\Entity;

use App\Repository\RecetaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecetaRepository::class)
 */
class Receta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="recetas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuarioIngreso;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaIngreso;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $rendimiento;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $total;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @ORM\OneToMany(targetEntity=RecetaDetalle::class, mappedBy="receta", orphanRemoval=true)
     */
    private $recetaDetalles;

    /**
     * @ORM\OneToMany(targetEntity=Producto::class, mappedBy="receta")
     */
    private $productos;

    public function __construct()
    {
        $this->recetaDetalles = new ArrayCollection();
        $this->productos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUsuarioIngreso(): ?Usuario
    {
        return $this->usuarioIngreso;
    }

    public function setUsuarioIngreso(?Usuario $usuarioIngreso): self
    {
        $this->usuarioIngreso = $usuarioIngreso;

        return $this;
    }

    public function getEmpresa(): ?Empresa
    {
        return $this->empresa;
    }

    public function setEmpresa(?Empresa $empresa): self
    {
        $this->empresa = $empresa;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getFechaIngreso(): ?\DateTimeInterface
    {
        return $this->fechaIngreso;
    }

    public function setFechaIngreso(\DateTimeInterface $fechaIngreso): self
    {
        $this->fechaIngreso = $fechaIngreso;

        return $this;
    }

    public function getRendimiento(): ?float
    {
        return $this->rendimiento;
    }

    public function setRendimiento(?float $rendimiento): self
    {
        $this->rendimiento = $rendimiento;

        return $this;
    }

    public function getTotal(): ?float
    {
        return $this->total;
    }

    public function setTotal(?float $total): self
    {
        $this->total = $total;

        return $this;
    }

    public function getEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * @return Collection|RecetaDetalle[]
     */
    public function getRecetaDetalles(): Collection
    {
        return $this->recetaDetalles;
    }

    public function addRecetaDetalle(RecetaDetalle $recetaDetalle): self
    {
        if (!$this->recetaDetalles->contains($recetaDetalle)) {
            $this->recetaDetalles[] = $recetaDetalle;
            $recetaDetalle->setReceta($this);
        }

        return $this;
    }

    public function removeRecetaDetalle(RecetaDetalle $recetaDetalle): self
    {
        if ($this->recetaDetalles->removeElement($recetaDetalle)) {
            // set the owning side to null (unless already changed)
            if ($recetaDetalle->getReceta() === $this) {
                $recetaDetalle->setReceta(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Producto[]
     */
    public function getProductos(): Collection
    {
        return $this->productos;
    }

    public function addProducto(Producto $producto): self
    {
        if (!$this->productos->contains($producto)) {
            $this->productos[] = $producto;
            $producto->setReceta($this);
        }

        return $this;
    }

    public function removeProducto(Producto $producto): self
    {
        if ($this->productos->removeElement($producto)) {
            // set the owning side to null (unless already changed)
            if ($producto->getReceta() === $this) {
                $producto->setReceta(null);
            }
        }

        return $this;
    }


    function __toString()
    {
        return $this->nombre;
    }
}
