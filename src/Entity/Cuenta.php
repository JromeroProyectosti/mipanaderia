<?php

namespace App\Entity;

use App\Repository\CuentaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CuentaRepository::class)
 */
class Cuenta
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nombre;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fechaCreacion;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaUltimamodificacion;

    /**
     * @ORM\ManyToOne(targetEntity=Empresa::class, inversedBy="cuentas")
     * @ORM\JoinColumn(nullable=false)
     */
    private $empresa;

    /**
     * @ORM\OneToMany(targetEntity=UsuarioCuenta::class, mappedBy="cuenta")
     */
    private $usuarioCuentas;

    /**
     * @ORM\OneToMany(targetEntity=Sucursal::class, mappedBy="cuenta")
     */
    private $sucursals;

    /**
     * @ORM\OneToMany(targetEntity=UsuarioUsuariocategoria::class, mappedBy="cuenta")
     */
    private $usuarioUsuariocategorias;

    /**
     * @ORM\OneToMany(targetEntity=Movimiento::class, mappedBy="cuenta")
     */
    private $movimientos;

    /**
     * @ORM\OneToMany(targetEntity=Solicitud::class, mappedBy="Cuenta")
     */
    private $solicitudes;

    
  

    public function __construct()
    {
        $this->usuarioCuentas = new ArrayCollection();
        $this->sucursals = new ArrayCollection();
        $this->usuarioUsuariocategorias = new ArrayCollection();
        $this->movimientos = new ArrayCollection();
        $this->solicitudes = new ArrayCollection();

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

    public function getFechaCreacion(): ?\DateTimeInterface
    {
        return $this->fechaCreacion;
    }

    public function setFechaCreacion(\DateTimeInterface $fechaCreacion): self
    {
        $this->fechaCreacion = $fechaCreacion;

        return $this;
    }

    public function getFechaUltimamodificacion(): ?\DateTimeInterface
    {
        return $this->fechaUltimamodificacion;
    }

    public function setFechaUltimamodificacion(?\DateTimeInterface $fechaUltimamodificacion): self
    {
        $this->fechaUltimamodificacion = $fechaUltimamodificacion;

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

    /**
     * @return Collection|UsuarioCuenta[]
     */
    public function getUsuarioCuentas(): Collection
    {
        return $this->usuarioCuentas;
    }

    public function addUsuarioCuenta(UsuarioCuenta $usuarioCuenta): self
    {
        if (!$this->usuarioCuentas->contains($usuarioCuenta)) {
            $this->usuarioCuentas[] = $usuarioCuenta;
            $usuarioCuenta->setCuenta($this);
        }

        return $this;
    }

    public function removeUsuarioCuenta(UsuarioCuenta $usuarioCuenta): self
    {
        if ($this->usuarioCuentas->removeElement($usuarioCuenta)) {
            // set the owning side to null (unless already changed)
            if ($usuarioCuenta->getCuenta() === $this) {
                $usuarioCuenta->setCuenta(null);
            }
        }

        return $this;
    }
    public function __toString()
    {
        return $this->getNombre();
    }

    
    /**
     * @return Collection|Sucursal[]
     */
    public function getSucursals(): Collection
    {
        return $this->sucursals;
    }

    public function addSucursal(Sucursal $sucursal): self
    {
        if (!$this->sucursals->contains($sucursal)) {
            $this->sucursals[] = $sucursal;
            $sucursal->setCuenta($this);
        }

        return $this;
    }

    public function removeSucursal(Sucursal $sucursal): self
    {
        if ($this->sucursals->removeElement($sucursal)) {
            // set the owning side to null (unless already changed)
            if ($sucursal->getCuenta() === $this) {
                $sucursal->setCuenta(null);
            }
        }

        return $this;
    }

   

    /**
     * @return Collection|UsuarioUsuariocategoria[]
     */
    public function getUsuarioUsuariocategorias(): Collection
    {
        return $this->usuarioUsuariocategorias;
    }

    public function addUsuarioUsuariocategoria(UsuarioUsuariocategoria $usuarioUsuariocategoria): self
    {
        if (!$this->usuarioUsuariocategorias->contains($usuarioUsuariocategoria)) {
            $this->usuarioUsuariocategorias[] = $usuarioUsuariocategoria;
            $usuarioUsuariocategoria->setCuenta($this);
        }

        return $this;
    }

    public function removeUsuarioUsuariocategoria(UsuarioUsuariocategoria $usuarioUsuariocategoria): self
    {
        if ($this->usuarioUsuariocategorias->removeElement($usuarioUsuariocategoria)) {
            // set the owning side to null (unless already changed)
            if ($usuarioUsuariocategoria->getCuenta() === $this) {
                $usuarioUsuariocategoria->setCuenta(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Movimiento[]
     */
    public function getMovimientos(): Collection
    {
        return $this->movimientos;
    }

    public function addMovimiento(Movimiento $movimiento): self
    {
        if (!$this->movimientos->contains($movimiento)) {
            $this->movimientos[] = $movimiento;
            $movimiento->setCuenta($this);
        }

        return $this;
    }

    public function removeMovimiento(Movimiento $movimiento): self
    {
        if ($this->movimientos->removeElement($movimiento)) {
            // set the owning side to null (unless already changed)
            if ($movimiento->getCuenta() === $this) {
                $movimiento->setCuenta(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Solicitud[]
     */
    public function getSolicitudes(): Collection
    {
        return $this->solicitudes;
    }

    public function addSolicitude(Solicitud $solicitude): self
    {
        if (!$this->solicitudes->contains($solicitude)) {
            $this->solicitudes[] = $solicitude;
            $solicitude->setCuenta($this);
        }

        return $this;
    }

    public function removeSolicitude(Solicitud $solicitude): self
    {
        if ($this->solicitudes->removeElement($solicitude)) {
            // set the owning side to null (unless already changed)
            if ($solicitude->getCuenta() === $this) {
                $solicitude->setCuenta(null);
            }
        }

        return $this;
    }

    

    
}
