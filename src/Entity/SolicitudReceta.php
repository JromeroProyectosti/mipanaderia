<?php

namespace App\Entity;

use App\Repository\SolicitudRecetaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolicitudRecetaRepository::class)
 */
class SolicitudReceta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Receta::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $receta;

    /**
     * @ORM\ManyToOne(targetEntity=Solicitud::class, inversedBy="solicitudRecetas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $solicitud;

    /**
     * @ORM\OneToMany(targetEntity=SolicitudRecetaDetalle::class, mappedBy="solicitudReceta", orphanRemoval=true)
     */
    private $solicitudRecetaDetalles;

    public function __construct()
    {
        $this->solicitudRecetaDetalles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSolicitud(): ?Solicitud
    {
        return $this->solicitud;
    }

    public function setSolicitud(?Solicitud $solicitud): self
    {
        $this->solicitud = $solicitud;

        return $this;
    }

    /**
     * @return Collection|SolicitudRecetaDetalle[]
     */
    public function getSolicitudRecetaDetalles(): Collection
    {
        return $this->solicitudRecetaDetalles;
    }

    public function addSolicitudRecetaDetalle(SolicitudRecetaDetalle $solicitudRecetaDetalle): self
    {
        if (!$this->solicitudRecetaDetalles->contains($solicitudRecetaDetalle)) {
            $this->solicitudRecetaDetalles[] = $solicitudRecetaDetalle;
            $solicitudRecetaDetalle->setSolicitudReceta($this);
        }

        return $this;
    }

    public function removeSolicitudRecetaDetalle(SolicitudRecetaDetalle $solicitudRecetaDetalle): self
    {
        if ($this->solicitudRecetaDetalles->removeElement($solicitudRecetaDetalle)) {
            // set the owning side to null (unless already changed)
            if ($solicitudRecetaDetalle->getSolicitudReceta() === $this) {
                $solicitudRecetaDetalle->setSolicitudReceta(null);
            }
        }

        return $this;
    }
}
