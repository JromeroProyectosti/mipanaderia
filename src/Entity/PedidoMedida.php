<?php

namespace App\Entity;

use App\Repository\PedidoMedidaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PedidoMedidaRepository::class)
 */
class PedidoMedida
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombreMedida;

    /**
     * @ORM\Column(type="string", length=10)
     */
    private $cod;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @ORM\Column(type="integer")
     */
    private $orden;

    /**
     * @ORM\OneToMany(targetEntity=PedidoDetalle::class, mappedBy="pedidoMedida", orphanRemoval=true)
     */
    private $pedidoDetalles;

    public function __construct()
    {
        $this->pedidoDetalles = new ArrayCollection();
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

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getNombreMedida(): ?string
    {
        return $this->nombreMedida;
    }

    public function setNombreMedida(string $nombreMedida): self
    {
        $this->nombreMedida = $nombreMedida;

        return $this;
    }

    public function getCod(): ?string
    {
        return $this->cod;
    }

    public function setCod(string $cod): self
    {
        $this->cod = $cod;

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

    public function getOrden(): ?int
    {
        return $this->orden;
    }

    public function setOrden(int $orden): self
    {
        $this->orden = $orden;

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
            $pedidoDetalle->setPedidoMedida($this);
        }

        return $this;
    }

    public function removePedidoDetalle(PedidoDetalle $pedidoDetalle): self
    {
        if ($this->pedidoDetalles->removeElement($pedidoDetalle)) {
            // set the owning side to null (unless already changed)
            if ($pedidoDetalle->getPedidoMedida() === $this) {
                $pedidoDetalle->setPedidoMedida(null);
            }
        }

        return $this;
    }

    function __toString()
    {
        return $this->nombreMedida;
    }
}
