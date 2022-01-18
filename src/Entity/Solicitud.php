<?php

namespace App\Entity;

use App\Repository\SolicitudRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolicitudRepository::class)
 */
class Solicitud
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
     * @ORM\ManyToOne(targetEntity=Cuenta::class, inversedBy="solicitudes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Cuenta;

    /**
     * @ORM\ManyToOne(targetEntity=Usuario::class, inversedBy="solicitudes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuario;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaCreacion;

    /**
     * @ORM\OneToMany(targetEntity=SolicitudPedido::class, mappedBy="solicitud", orphanRemoval=true)
     */
    private $solicitudPedidos;

    /**
     * @ORM\OneToMany(targetEntity=SolicitudReceta::class, mappedBy="solicitud", orphanRemoval=true)
     */
    private $solicitudRecetas;

    public function __construct()
    {
        $this->solicitudPedidos = new ArrayCollection();
        $this->solicitudRecetas = new ArrayCollection();
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

    public function getCuenta(): ?Cuenta
    {
        return $this->Cuenta;
    }

    public function setCuenta(?Cuenta $Cuenta): self
    {
        $this->Cuenta = $Cuenta;

        return $this;
    }

    public function getUsuario(): ?Usuario
    {
        return $this->usuario;
    }

    public function setUsuario(?Usuario $usuario): self
    {
        $this->usuario = $usuario;

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
            $solicitudPedido->setSolicitud($this);
        }

        return $this;
    }

    public function removeSolicitudPedido(SolicitudPedido $solicitudPedido): self
    {
        if ($this->solicitudPedidos->removeElement($solicitudPedido)) {
            // set the owning side to null (unless already changed)
            if ($solicitudPedido->getSolicitud() === $this) {
                $solicitudPedido->setSolicitud(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|SolicitudReceta[]
     */
    public function getSolicitudRecetas(): Collection
    {
        return $this->solicitudRecetas;
    }

    public function addSolicitudReceta(SolicitudReceta $solicitudReceta): self
    {
        if (!$this->solicitudRecetas->contains($solicitudReceta)) {
            $this->solicitudRecetas[] = $solicitudReceta;
            $solicitudReceta->setSolicitud($this);
        }

        return $this;
    }

    public function removeSolicitudReceta(SolicitudReceta $solicitudReceta): self
    {
        if ($this->solicitudRecetas->removeElement($solicitudReceta)) {
            // set the owning side to null (unless already changed)
            if ($solicitudReceta->getSolicitud() === $this) {
                $solicitudReceta->setSolicitud(null);
            }
        }

        return $this;
    }
}
