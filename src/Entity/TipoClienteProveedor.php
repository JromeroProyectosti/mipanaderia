<?php

namespace App\Entity;

use App\Repository\TipoClienteProveedorRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TipoClienteProveedorRepository::class)
 */
class TipoClienteProveedor
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $nombre;

    /**
     * @ORM\OneToMany(targetEntity=ClienteProveedor::class, mappedBy="tipoClienteProveedor")
     */
    private $clienteProveedors;

    public function __construct()
    {
        $this->clienteProveedors = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    /**
     * @return Collection|ClienteProveedor[]
     */
    public function getClienteProveedors(): Collection
    {
        return $this->clienteProveedors;
    }

    public function addClienteProveedor(ClienteProveedor $clienteProveedor): self
    {
        if (!$this->clienteProveedors->contains($clienteProveedor)) {
            $this->clienteProveedors[] = $clienteProveedor;
            $clienteProveedor->setTipoClienteProveedor($this);
        }

        return $this;
    }

    public function removeClienteProveedor(ClienteProveedor $clienteProveedor): self
    {
        if ($this->clienteProveedors->removeElement($clienteProveedor)) {
            // set the owning side to null (unless already changed)
            if ($clienteProveedor->getTipoClienteProveedor() === $this) {
                $clienteProveedor->setTipoClienteProveedor(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->nombre;
    }
}
