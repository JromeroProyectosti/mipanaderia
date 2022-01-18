<?php

namespace App\Entity;

use App\Repository\SolicitudRecetaDetalleRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolicitudRecetaDetalleRepository::class)
 */
class SolicitudRecetaDetalle
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=SolicitudReceta::class, inversedBy="solicitudRecetaDetalles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $solicitudReceta;

    /**
     * @ORM\ManyToOne(targetEntity=RecetaDetalle::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $recetaDetalle;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSolicitudReceta(): ?SolicitudReceta
    {
        return $this->solicitudReceta;
    }

    public function setSolicitudReceta(?SolicitudReceta $solicitudReceta): self
    {
        $this->solicitudReceta = $solicitudReceta;

        return $this;
    }

    public function getRecetaDetalle(): ?RecetaDetalle
    {
        return $this->recetaDetalle;
    }

    public function setRecetaDetalle(?RecetaDetalle $recetaDetalle): self
    {
        $this->recetaDetalle = $recetaDetalle;

        return $this;
    }
}
