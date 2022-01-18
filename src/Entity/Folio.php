<?php

namespace App\Entity;

use App\Repository\FolioRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=FolioRepository::class)
 */
class Folio
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="folios")
     */
    private $empresa;

    /**
     * @ORM\Column(type="integer")
     */
    private $ingreso;

    /**
     * @ORM\Column(type="integer")
     */
    private $egreso;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $pedido;

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

    public function getIngreso(): ?int
    {
        return $this->ingreso;
    }

    public function setIngreso(int $ingreso): self
    {
        $this->ingreso = $ingreso;

        return $this;
    }

    public function getEgreso(): ?int
    {
        return $this->egreso;
    }

    public function setEgreso(int $egreso): self
    {
        $this->egreso = $egreso;

        return $this;
    }

    public function getPedido(): ?int
    {
        return $this->pedido;
    }

    public function setPedido(?int $pedido): self
    {
        $this->pedido = $pedido;

        return $this;
    }
}
