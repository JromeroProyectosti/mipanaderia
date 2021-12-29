<?php

namespace App\Entity;

use App\Repository\ProductoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductoRepository::class)
 */
class Producto
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="productos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    /**
     * @ORM\ManyToOne(targetEntity=ProductoTipo::class, inversedBy="productos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productoTipo;

    /**
     * @ORM\ManyToOne(targetEntity=ProductoUnidad::class, inversedBy="productos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $productoUnidad;

    /**
     * @ORM\Column(type="text")
     */
    private $codigo;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="float")
     */
    private $cantidadPaquete;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @ORM\Column(type="integer")
     */
    private $stockMinimo;

    /**
     * @ORM\OneToMany(targetEntity=MovimientoProducto::class, mappedBy="producto")
     */
    private $movimientoProductos;

    /**
     * @ORM\ManyToOne(targetEntity=Receta::class, inversedBy="productos")
     */
    private $receta;

    public function __construct()
    {
        $this->movimientoProductos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getProductoTipo(): ?ProductoTipo
    {
        return $this->productoTipo;
    }

    public function setProductoTipo(?ProductoTipo $productoTipo): self
    {
        $this->productoTipo = $productoTipo;

        return $this;
    }

    public function getProductoUnidad(): ?ProductoUnidad
    {
        return $this->productoUnidad;
    }

    public function setProductoUnidad(?ProductoUnidad $productoUnidad): self
    {
        $this->productoUnidad = $productoUnidad;

        return $this;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

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

    public function getCantidadPaquete(): ?int
    {
        return $this->cantidadPaquete;
    }

    public function setCantidadPaquete(int $cantidadPaquete): self
    {
        $this->cantidadPaquete = $cantidadPaquete;

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

    public function getStockMinimo(): ?int
    {
        return $this->stockMinimo;
    }

    public function setStockMinimo(int $stockMinimo): self
    {
        $this->stockMinimo = $stockMinimo;

        return $this;
    }

    /**
     * @return Collection|MovimientoProducto[]
     */
    public function getMovimientoProductos(): Collection
    {
        return $this->movimientoProductos;
    }

    public function addMovimientoProducto(MovimientoProducto $movimientoProducto): self
    {
        if (!$this->movimientoProductos->contains($movimientoProducto)) {
            $this->movimientoProductos[] = $movimientoProducto;
            $movimientoProducto->setProducto($this);
        }

        return $this;
    }

    public function removeMovimientoProducto(MovimientoProducto $movimientoProducto): self
    {
        if ($this->movimientoProductos->removeElement($movimientoProducto)) {
            // set the owning side to null (unless already changed)
            if ($movimientoProducto->getProducto() === $this) {
                $movimientoProducto->setProducto(null);
            }
        }

        return $this;
    }
    function __toString()
    {
        return $this->nombre;
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
}
