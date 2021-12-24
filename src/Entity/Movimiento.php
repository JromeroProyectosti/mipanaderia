<?php

namespace App\Entity;

use App\Repository\MovimientoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MovimientoRepository::class)
 */
class Movimiento
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="movimientos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuarioIngreso;

    /**
     * @ORM\ManyToOne(targetEntity=MovimientoTipo::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $movimientoTipo;

    /**
     * @ORM\ManyToOne(targetEntity=ClienteProveedor::class, inversedBy="movimientos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $clienteProveedor;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    /**
     * @ORM\ManyToOne(targetEntity=Cuenta::class, inversedBy="movimientos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $cuenta;

    /**
     * @ORM\Column(type="integer")
     */
    private $folio;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaIngreso;

    /**
     * @ORM\Column(type="date")
     */
    private $fechaEmision;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $valorTotal;

    /**
     * @ORM\OneToMany(targetEntity=MovimientoProducto::class, mappedBy="movimiento")
     */
    private $movimientoProductos;

    public function __construct()
    {
        $this->movimientoProductos = new ArrayCollection();
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

    public function getMovimientoTipo(): ?MovimientoTipo
    {
        return $this->movimientoTipo;
    }

    public function setMovimientoTipo(?MovimientoTipo $movimientoTipo): self
    {
        $this->movimientoTipo = $movimientoTipo;

        return $this;
    }

    public function getClienteProveedor(): ?CLienteProveedor
    {
        return $this->clienteProveedor;
    }

    public function setClienteProveedor(?CLienteProveedor $clienteProveedor): self
    {
        $this->clienteProveedor = $clienteProveedor;

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

    public function getCuenta(): ?Cuenta
    {
        return $this->cuenta;
    }

    public function setCuenta(?Cuenta $cuenta): self
    {
        $this->cuenta = $cuenta;

        return $this;
    }

    public function getFolio(): ?int
    {
        return $this->folio;
    }

    public function setFolio(int $folio): self
    {
        $this->folio = $folio;

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

    public function getFechaEmision(): ?\DateTimeInterface
    {
        return $this->fechaEmision;
    }

    public function setFechaEmision(\DateTimeInterface $fechaEmision): self
    {
        $this->fechaEmision = $fechaEmision;

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

    public function getValorTotal(): ?float
    {
        return $this->valorTotal;
    }

    public function setValorTotal(?float $valorTotal): self
    {
        $this->valorTotal = $valorTotal;

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
            $movimientoProducto->setMovimiento($this);
        }

        return $this;
    }

    public function removeMovimientoProducto(MovimientoProducto $movimientoProducto): self
    {
        if ($this->movimientoProductos->removeElement($movimientoProducto)) {
            // set the owning side to null (unless already changed)
            if ($movimientoProducto->getMovimiento() === $this) {
                $movimientoProducto->setMovimiento(null);
            }
        }

        return $this;
    }
}
