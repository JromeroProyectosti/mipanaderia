<?php

namespace App\Entity;

use App\Repository\UsuarioRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;

/**
 * @ORM\Entity(repositoryClass=UsuarioRepository::class)
 */
class Usuario implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=180, unique=true)
     */
    private $username;


    /**
     * @var string The hashed password
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $nombre;

    /**
     * @ORM\Column(type="boolean")
     */
    private $estado;

    /**
     * @ORM\Column(type="datetime")
     */
    private $fecha_activacion;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $correo;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $token;

    /**
     * @ORM\ManyToOne(targetEntity=UsuarioTipo::class, inversedBy="usuarios")
     * @ORM\JoinColumn(nullable=false)
     */
    private $usuarioTipo;

   
    /**
     * @ORM\OneToMany(targetEntity=UsuarioCuenta::class, mappedBy="usuario")
     */
    private $usuarioCuentas;

    /**
     * @ORM\OneToMany(targetEntity=Privilegio::class, mappedBy="usuario", orphanRemoval=true)
     */
    private $privilegios;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $empresaActual;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $fechaNoDisponible;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $whatsapp;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $telefono;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rut;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $direccion;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $sexo;

    /**
     * @ORM\ManyToOne(targetEntity=UsuarioCategoria::class, inversedBy="usuarios")
     */
    private $categoria;

    /**
     * @ORM\ManyToOne(targetEntity=UsuarioStatus::class, inversedBy="usuarios")
     */
    private $status;

    
    /**
     * @ORM\ManyToOne(targetEntity=UsuarioTipoDocumento::class, inversedBy="usuarios")
     */
    private $tipoDocumento;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $passwordAnt;

    /**
     * @ORM\OneToMany(targetEntity=UsuarioUsuariocategoria::class, mappedBy="usuario", orphanRemoval=true)
     */
    private $usuarioUsuariocategorias;

    
    /**
     * @ORM\OneToMany(targetEntity=Importacion::class, mappedBy="usuarioCarga")
     */
    private $importacions;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $lunes;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $lunesStart;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $lunesEnd;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $martes;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $martesStart;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $martesEnd;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $miercoles;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $miercolesStart;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $miercolesEnd;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $jueves;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $juevesStart;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $juevesEnd;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $viernes;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $viernesStart;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $viernesEnd;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $sabado;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $sabadoStart;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $sabadoEnd;

    /**
     * @ORM\Column(type="boolean", nullable=true)
     */
    private $domingo;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $domingoStart;

    /**
     * @ORM\Column(type="time", nullable=true)
     */
    private $domingoEnd;

    /**
     * @ORM\OneToMany(targetEntity=UsuarioNoDisponible::class, mappedBy="usuario")
     */
    private $usuarioNoDisponibles;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $sobrecupo;

    /**
     * @ORM\Column(type="json", nullable=true)
     */
    private $lotes = [];

    /**
     * @ORM\OneToMany(targetEntity=Movimiento::class, mappedBy="usuarioIngreso")
     */
    private $movimientos;

    /**
     * @ORM\OneToMany(targetEntity=Receta::class, mappedBy="usuarioIngreso")
     */
    private $recetas;

    /**
     * @ORM\OneToMany(targetEntity=Solicitud::class, mappedBy="usuario")
     */
    private $solicitudes;


    
    public function __construct()
    {
        $this->usuarioCuentas = new ArrayCollection();
        $this->privilegios = new ArrayCollection();
        $this->usuarioUsuariocategorias = new ArrayCollection();
        $this->importacions = new ArrayCollection();
        $this->usuarioContratos = new ArrayCollection();
        $this->usuarioNoDisponibles = new ArrayCollection();
        $this->movimientos = new ArrayCollection();
        $this->recetas = new ArrayCollection();
        $this->solicitudes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUsername(): string
    {
        return (string) $this->username;
    }

    public function setUsername(string $username): self
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        //$roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[]= 'ROLE_USER';

        return $roles;
    }

   

    /**
     * @see UserInterface
     */
    public function getPassword(): string
    {
        return (string) $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function getSalt()
    {
        // not needed when using the "bcrypt" algorithm in security.yaml
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
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

    public function getEstado(): ?bool
    {
        return $this->estado;
    }

    public function setEstado(bool $estado): self
    {
        $this->estado = $estado;

        return $this;
    }

    public function getFechaActivacion(): ?\DateTimeInterface
    {
        return $this->fecha_activacion;
    }

    public function setFechaActivacion(\DateTimeInterface $fecha_activacion): self
    {
        $this->fecha_activacion = $fecha_activacion;

        return $this;
    }

    public function getCorreo(): ?string
    {
        return $this->correo;
    }

    public function setCorreo(string $correo): self
    {
        $this->correo = $correo;

        return $this;
    }

    public function getToken(): ?string
    {
        return $this->token;
    }

    public function setToken(?string $token): self
    {
        $this->token = $token;

        return $this;
    }

    public function getUsuarioTipo(): ?UsuarioTipo
    {
        return $this->usuarioTipo;
    }

    public function setUsuarioTipo(?UsuarioTipo $usuarioTipo): self
    {
        $this->usuarioTipo = $usuarioTipo;

        return $this;
    }

    public function __toString()
    {
        return $this->nombre;
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
            $usuarioCuenta->setUsuario($this);
        }

        return $this;
    }

    public function removeUsuarioCuenta(UsuarioCuenta $usuarioCuenta): self
    {
        if ($this->usuarioCuentas->removeElement($usuarioCuenta)) {
            // set the owning side to null (unless already changed)
            if ($usuarioCuenta->getUsuario() === $this) {
                $usuarioCuenta->setUsuario(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Privilegio[]
     */
    public function getPrivilegios(): Collection
    {
        return $this->privilegios;
    }

    public function addPrivilegio(Privilegio $privilegio): self
    {
        if (!$this->privilegios->contains($privilegio)) {
            $this->privilegios[] = $privilegio;
            $privilegio->setUsuario($this);
        }

        return $this;
    }

    public function removePrivilegio(Privilegio $privilegio): self
    {
        if ($this->privilegios->removeElement($privilegio)) {
            // set the owning side to null (unless already changed)
            if ($privilegio->getUsuario() === $this) {
                $privilegio->setUsuario(null);
            }
        }

        return $this;
    }

    public function getEmpresaActual(): ?int
    {
        return $this->empresaActual;
    }

    public function setEmpresaActual(?int $empresaActual): self
    {
        $this->empresaActual = $empresaActual;

        return $this;
    }

    public function getFechaNoDisponible(): ?\DateTimeInterface
    {
        return $this->fechaNoDisponible;
    }

    public function setFechaNoDisponible(?\DateTimeInterface $fechaNoDisponible): self
    {
        $this->fechaNoDisponible = $fechaNoDisponible;

        return $this;
    }

    public function getWhatsapp(): ?string
    {
        return $this->whatsapp;
    }

    public function setWhatsapp(?string $whatsapp): self
    {
        $this->whatsapp = $whatsapp;

        return $this;
    }

    public function getTelefono(): ?string
    {
        return $this->telefono;
    }

    public function setTelefono(?string $telefono): self
    {
        $this->telefono = $telefono;

        return $this;
    }

    public function getRut(): ?string
    {
        return $this->rut;
    }

    public function setRut(?string $rut): self
    {
        $this->rut = $rut;

        return $this;
    }

    public function getDireccion(): ?string
    {
        return $this->direccion;
    }

    public function setDireccion(?string $direccion): self
    {
        $this->direccion = $direccion;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;

        return $this;
    }

    public function getCategoria(): ?UsuarioCategoria
    {
        return $this->categoria;
    }

    public function setCategoria(?UsuarioCategoria $categoria): self
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getStatus(): ?UsuarioStatus
    {
        return $this->status;
    }

    public function setStatus(?UsuarioStatus $status): self
    {
        $this->status = $status;

        return $this;
    }

   

    public function getTipoDocumento(): ?UsuarioTipoDocumento
    {
        return $this->tipoDocumento;
    }

    public function setTipoDocumento(?UsuarioTipoDocumento $tipoDocumento): self
    {
        $this->tipoDocumento = $tipoDocumento;

        return $this;
    }

    
    public function getColor(): ?string
    {
        return $this->color;
    }

    public function setColor(?string $color): self
    {
        $this->color = $color;

        return $this;
    }

    public function getPasswordAnt(): ?string
    {
        return $this->passwordAnt;
    }

    public function setPasswordAnt(?string $passwordAnt): self
    {
        $this->passwordAnt = $passwordAnt;

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
            $usuarioUsuariocategoria->setUsuario($this);
        }

        return $this;
    }

    public function removeUsuarioUsuariocategoria(UsuarioUsuariocategoria $usuarioUsuariocategoria): self
    {
        if ($this->usuarioUsuariocategorias->removeElement($usuarioUsuariocategoria)) {
            // set the owning side to null (unless already changed)
            if ($usuarioUsuariocategoria->getUsuario() === $this) {
                $usuarioUsuariocategoria->setUsuario(null);
            }
        }

        return $this;
    }

    
    /**
     * @return Collection|Importacion[]
     */
    public function getImportacions(): Collection
    {
        return $this->importacions;
    }

    public function addImportacion(Importacion $importacion): self
    {
        if (!$this->importacions->contains($importacion)) {
            $this->importacions[] = $importacion;
            $importacion->setUsuarioCarga($this);
        }

        return $this;
    }

    public function removeImportacion(Importacion $importacion): self
    {
        if ($this->importacions->removeElement($importacion)) {
            // set the owning side to null (unless already changed)
            if ($importacion->getUsuarioCarga() === $this) {
                $importacion->setUsuarioCarga(null);
            }
        }

        return $this;
    }

    public function getLunes(): ?bool
    {
        return $this->lunes;
    }

    public function setLunes(?bool $lunes): self
    {
        $this->lunes = $lunes;

        return $this;
    }

    public function getLunesStart(): ?\DateTimeInterface
    {
        return $this->lunesStart;
    }

    public function setLunesStart(?\DateTimeInterface $lunesStart): self
    {
        $this->lunesStart = $lunesStart;

        return $this;
    }

    public function getLunesEnd(): ?\DateTimeInterface
    {
        return $this->lunesEnd;
    }

    public function setLunesEnd(?\DateTimeInterface $lunesEnd): self
    {
        $this->lunesEnd = $lunesEnd;

        return $this;
    }

    public function getMartes(): ?bool
    {
        return $this->martes;
    }

    public function setMartes(?bool $martes): self
    {
        $this->martes = $martes;

        return $this;
    }

    public function getMartesStart(): ?\DateTimeInterface
    {
        return $this->martesStart;
    }

    public function setMartesStart(?\DateTimeInterface $martesStart): self
    {
        $this->martesStart = $martesStart;

        return $this;
    }

    public function getMartesEnd(): ?\DateTimeInterface
    {
        return $this->martesEnd;
    }

    public function setMartesEnd(?\DateTimeInterface $martesEnd): self
    {
        $this->martesEnd = $martesEnd;

        return $this;
    }

    public function getMiercoles(): ?bool
    {
        return $this->miercoles;
    }

    public function setMiercoles(?bool $miercoles): self
    {
        $this->miercoles = $miercoles;

        return $this;
    }

    public function getMiercolesStart(): ?\DateTimeInterface
    {
        return $this->miercolesStart;
    }

    public function setMiercolesStart(?\DateTimeInterface $miercolesStart): self
    {
        $this->miercolesStart = $miercolesStart;

        return $this;
    }

    public function getMiercolesEnd(): ?\DateTimeInterface
    {
        return $this->miercolesEnd;
    }

    public function setMiercolesEnd(?\DateTimeInterface $miercolesEnd): self
    {
        $this->miercolesEnd = $miercolesEnd;

        return $this;
    }

    public function getJueves(): ?bool
    {
        return $this->jueves;
    }

    public function setJueves(?bool $jueves): self
    {
        $this->jueves = $jueves;

        return $this;
    }

    public function getJuevesStart(): ?\DateTimeInterface
    {
        return $this->juevesStart;
    }

    public function setJuevesStart(?\DateTimeInterface $juevesStart): self
    {
        $this->juevesStart = $juevesStart;

        return $this;
    }

    public function getJuevesEnd(): ?\DateTimeInterface
    {
        return $this->juevesEnd;
    }

    public function setJuevesEnd(?\DateTimeInterface $juevesEnd): self
    {
        $this->juevesEnd = $juevesEnd;

        return $this;
    }

    public function getViernes(): ?bool
    {
        return $this->viernes;
    }

    public function setViernes(?bool $viernes): self
    {
        $this->viernes = $viernes;

        return $this;
    }

    public function getViernesStart(): ?\DateTimeInterface
    {
        return $this->viernesStart;
    }

    public function setViernesStart(?\DateTimeInterface $viernesStart): self
    {
        $this->viernesStart = $viernesStart;

        return $this;
    }

    public function getViernesEnd(): ?\DateTimeInterface
    {
        return $this->viernesEnd;
    }

    public function setViernesEnd(?\DateTimeInterface $viernesEnd): self
    {
        $this->viernesEnd = $viernesEnd;

        return $this;
    }

    public function getSabado(): ?bool
    {
        return $this->sabado;
    }

    public function setSabado(?bool $sabado): self
    {
        $this->sabado = $sabado;

        return $this;
    }

    public function getSabadoStart(): ?\DateTimeInterface
    {
        return $this->sabadoStart;
    }

    public function setSabadoStart(?\DateTimeInterface $sabadoStart): self
    {
        $this->sabadoStart = $sabadoStart;

        return $this;
    }

    public function getSabadoEnd(): ?\DateTimeInterface
    {
        return $this->sabadoEnd;
    }

    public function setSabadoEnd(?\DateTimeInterface $sabadoEnd): self
    {
        $this->sabadoEnd = $sabadoEnd;

        return $this;
    }

    public function getDomingo(): ?bool
    {
        return $this->domingo;
    }

    public function setDomingo(?bool $domingo): self
    {
        $this->domingo = $domingo;

        return $this;
    }

    public function getDomingoStart(): ?\DateTimeInterface
    {
        return $this->domingoStart;
    }

    public function setDomingoStart(?\DateTimeInterface $domingoStart): self
    {
        $this->domingoStart = $domingoStart;

        return $this;
    }

    public function getDomingoEnd(): ?\DateTimeInterface
    {
        return $this->domingoEnd;
    }

    public function setDomingoEnd(?\DateTimeInterface $domingoEnd): self
    {
        $this->domingoEnd = $domingoEnd;

        return $this;
    }

    /**
     * @return Collection|UsuarioNoDisponible[]
     */
    public function getUsuarioNoDisponibles(): Collection
    {
        return $this->usuarioNoDisponibles;
    }

    public function addUsuarioNoDisponible(UsuarioNoDisponible $usuarioNoDisponible): self
    {
        if (!$this->usuarioNoDisponibles->contains($usuarioNoDisponible)) {
            $this->usuarioNoDisponibles[] = $usuarioNoDisponible;
            $usuarioNoDisponible->setUsuario($this);
        }

        return $this;
    }

    public function removeUsuarioNoDisponible(UsuarioNoDisponible $usuarioNoDisponible): self
    {
        if ($this->usuarioNoDisponibles->removeElement($usuarioNoDisponible)) {
            // set the owning side to null (unless already changed)
            if ($usuarioNoDisponible->getUsuario() === $this) {
                $usuarioNoDisponible->setUsuario(null);
            }
        }

        return $this;
    }

    public function getSobrecupo(): ?int
    {
        return $this->sobrecupo;
    }

    public function setSobrecupo(?int $sobrecupo): self
    {
        $this->sobrecupo = $sobrecupo;

        return $this;
    }

    public function getLotes(): ?array
    {
        return $this->lotes;
    }

    public function setLotes(?array $lotes): self
    {
        $this->lotes = $lotes;

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
            $movimiento->setUsuarioIngreso($this);
        }

        return $this;
    }

    public function removeMovimiento(Movimiento $movimiento): self
    {
        if ($this->movimientos->removeElement($movimiento)) {
            // set the owning side to null (unless already changed)
            if ($movimiento->getUsuarioIngreso() === $this) {
                $movimiento->setUsuarioIngreso(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Receta[]
     */
    public function getRecetas(): Collection
    {
        return $this->recetas;
    }

    public function addReceta(Receta $receta): self
    {
        if (!$this->recetas->contains($receta)) {
            $this->recetas[] = $receta;
            $receta->setUsuarioIngreso($this);
        }

        return $this;
    }

    public function removeReceta(Receta $receta): self
    {
        if ($this->recetas->removeElement($receta)) {
            // set the owning side to null (unless already changed)
            if ($receta->getUsuarioIngreso() === $this) {
                $receta->setUsuarioIngreso(null);
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
            $solicitude->setUsuario($this);
        }

        return $this;
    }

    public function removeSolicitude(Solicitud $solicitude): self
    {
        if ($this->solicitudes->removeElement($solicitude)) {
            // set the owning side to null (unless already changed)
            if ($solicitude->getUsuario() === $this) {
                $solicitude->setUsuario(null);
            }
        }

        return $this;
    }

    

    
}
