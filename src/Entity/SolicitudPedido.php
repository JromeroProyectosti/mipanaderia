<?php

namespace App\Entity;

use App\Repository\SolicitudPedidoRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SolicitudPedidoRepository::class)
 */
class SolicitudPedido
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Solicitud::class, inversedBy="solicitudPedidos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $solicitud;

    /**
     * @ORM\ManyToOne(targetEntity=Pedido::class, inversedBy="solicitudPedidos")
     * @ORM\JoinColumn(nullable=false)
     */
    private $pedido;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $kilos;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=3, nullable=true)
     */
    private $latas;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPedido(): ?Pedido
    {
        return $this->pedido;
    }

    public function setPedido(?Pedido $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }

    public function getKilos(): ?string
    {
        return $this->kilos;
    }

    public function setKilos(?string $kilos): self
    {
        $this->kilos = $kilos;

        return $this;
    }

    public function getLatas(): ?string
    {
        return $this->latas;
    }

    public function setLatas(?string $latas): self
    {
        $this->latas = $latas;

        return $this;
    }
}
