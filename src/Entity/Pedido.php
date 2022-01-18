<?php

namespace App\Entity;

use App\Repository\PedidoRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PedidoRepository::class)
 */
class Pedido
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Cliente::class)
     */
    private $cliente;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    /**
     * @ORM\ManyToOne(targetEntity=PedidoEstado::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $estado;

    /**
     * @ORM\Column(type="integer")
     */
    private $folio;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaCreacion;

    /**
     * @ORM\OneToMany(targetEntity=PedidoDetalle::class, mappedBy="pedido", orphanRemoval=true)
     */
    private $pedidoDetalles;

    /**
     * @ORM\OneToMany(targetEntity=SolicitudPedido::class, mappedBy="pedido", orphanRemoval=true)
     */
    private $solicitudPedidos;

    public function __construct()
    {
        $this->pedidoDetalles = new ArrayCollection();
        $this->solicitudPedidos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCliente(): ?Cliente
    {
        return $this->cliente;
    }

    public function setCliente(?Cliente $cliente): self
    {
        $this->cliente = $cliente;

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

    public function getEstado(): ?PedidoEstado
    {
        return $this->estado;
    }

    public function setEstado(?PedidoEstado $estado): self
    {
        $this->estado = $estado;

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

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    /**
     * @return Collection|PedidoDetalle[]
     */
    public function getPedidoDetalles(): Collection
    {
        return $this->pedidoDetalles;
    }

    public function addPedidoDetalle(PedidoDetalle $pedidoDetalle): self
    {
        if (!$this->pedidoDetalles->contains($pedidoDetalle)) {
            $this->pedidoDetalles[] = $pedidoDetalle;
            $pedidoDetalle->setPedido($this);
        }

        return $this;
    }

    public function removePedidoDetalle(PedidoDetalle $pedidoDetalle): self
    {
        if ($this->pedidoDetalles->removeElement($pedidoDetalle)) {
            // set the owning side to null (unless already changed)
            if ($pedidoDetalle->getPedido() === $this) {
                $pedidoDetalle->setPedido(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SolicitudPedido[]
     */
    public function getSolicitudPedidos(): Collection
    {
        return $this->solicitudPedidos;
    }

    public function addSolicitudPedido(SolicitudPedido $solicitudPedido): self
    {
        if (!$this->solicitudPedidos->contains($solicitudPedido)) {
            $this->solicitudPedidos[] = $solicitudPedido;
            $solicitudPedido->setPedido($this);
        }

        return $this;
    }

    public function removeSolicitudPedido(SolicitudPedido $solicitudPedido): self
    {
        if ($this->solicitudPedidos->removeElement($solicitudPedido)) {
            // set the owning side to null (unless already changed)
            if ($solicitudPedido->getPedido() === $this) {
                $solicitudPedido->setPedido(null);
            }
        }

        return $this;
    }
}
