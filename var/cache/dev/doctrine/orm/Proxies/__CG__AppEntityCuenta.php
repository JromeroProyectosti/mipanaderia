<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Cuenta extends \App\Entity\Cuenta implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'nombre', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'fechaCreacion', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'fechaUltimamodificacion', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'empresa', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'usuarioCuentas', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'agendas', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'sucursals', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'pageId', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'usuarioUsuariocategorias', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'importacions', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'vigenciaContratos', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'cuentaMaterias', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'juzgadoCuentas'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'nombre', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'fechaCreacion', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'fechaUltimamodificacion', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'empresa', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'usuarioCuentas', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'agendas', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'sucursals', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'pageId', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'usuarioUsuariocategorias', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'importacions', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'vigenciaContratos', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'cuentaMaterias', '' . "\0" . 'App\\Entity\\Cuenta' . "\0" . 'juzgadoCuentas'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Cuenta $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getNombre(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombre', []);

        return parent::getNombre();
    }

    /**
     * {@inheritDoc}
     */
    public function setNombre(string $nombre): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombre', [$nombre]);

        return parent::setNombre($nombre);
    }

    /**
     * {@inheritDoc}
     */
    public function getFechaCreacion(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechaCreacion', []);

        return parent::getFechaCreacion();
    }

    /**
     * {@inheritDoc}
     */
    public function setFechaCreacion(\DateTimeInterface $fechaCreacion): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaCreacion', [$fechaCreacion]);

        return parent::setFechaCreacion($fechaCreacion);
    }

    /**
     * {@inheritDoc}
     */
    public function getFechaUltimamodificacion(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getFechaUltimamodificacion', []);

        return parent::getFechaUltimamodificacion();
    }

    /**
     * {@inheritDoc}
     */
    public function setFechaUltimamodificacion(?\DateTimeInterface $fechaUltimamodificacion): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setFechaUltimamodificacion', [$fechaUltimamodificacion]);

        return parent::setFechaUltimamodificacion($fechaUltimamodificacion);
    }

    /**
     * {@inheritDoc}
     */
    public function getEmpresa(): ?\App\Entity\Empresa
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getEmpresa', []);

        return parent::getEmpresa();
    }

    /**
     * {@inheritDoc}
     */
    public function setEmpresa(?\App\Entity\Empresa $empresa): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setEmpresa', [$empresa]);

        return parent::setEmpresa($empresa);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsuarioCuentas(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsuarioCuentas', []);

        return parent::getUsuarioCuentas();
    }

    /**
     * {@inheritDoc}
     */
    public function addUsuarioCuenta(\App\Entity\UsuarioCuenta $usuarioCuenta): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUsuarioCuenta', [$usuarioCuenta]);

        return parent::addUsuarioCuenta($usuarioCuenta);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUsuarioCuenta(\App\Entity\UsuarioCuenta $usuarioCuenta): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUsuarioCuenta', [$usuarioCuenta]);

        return parent::removeUsuarioCuenta($usuarioCuenta);
    }

    /**
     * {@inheritDoc}
     */
    public function __toString()
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, '__toString', []);

        return parent::__toString();
    }

    /**
     * {@inheritDoc}
     */
    public function getAgendas(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getAgendas', []);

        return parent::getAgendas();
    }

    /**
     * {@inheritDoc}
     */
    public function addAgenda(\App\Entity\Agenda $agenda): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addAgenda', [$agenda]);

        return parent::addAgenda($agenda);
    }

    /**
     * {@inheritDoc}
     */
    public function removeAgenda(\App\Entity\Agenda $agenda): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeAgenda', [$agenda]);

        return parent::removeAgenda($agenda);
    }

    /**
     * {@inheritDoc}
     */
    public function getSucursals(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSucursals', []);

        return parent::getSucursals();
    }

    /**
     * {@inheritDoc}
     */
    public function addSucursal(\App\Entity\Sucursal $sucursal): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addSucursal', [$sucursal]);

        return parent::addSucursal($sucursal);
    }

    /**
     * {@inheritDoc}
     */
    public function removeSucursal(\App\Entity\Sucursal $sucursal): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeSucursal', [$sucursal]);

        return parent::removeSucursal($sucursal);
    }

    /**
     * {@inheritDoc}
     */
    public function getPageId(): ?float
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getPageId', []);

        return parent::getPageId();
    }

    /**
     * {@inheritDoc}
     */
    public function setPageId(?float $pageId): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setPageId', [$pageId]);

        return parent::setPageId($pageId);
    }

    /**
     * {@inheritDoc}
     */
    public function getUsuarioUsuariocategorias(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUsuarioUsuariocategorias', []);

        return parent::getUsuarioUsuariocategorias();
    }

    /**
     * {@inheritDoc}
     */
    public function addUsuarioUsuariocategoria(\App\Entity\UsuarioUsuariocategoria $usuarioUsuariocategoria): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addUsuarioUsuariocategoria', [$usuarioUsuariocategoria]);

        return parent::addUsuarioUsuariocategoria($usuarioUsuariocategoria);
    }

    /**
     * {@inheritDoc}
     */
    public function removeUsuarioUsuariocategoria(\App\Entity\UsuarioUsuariocategoria $usuarioUsuariocategoria): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeUsuarioUsuariocategoria', [$usuarioUsuariocategoria]);

        return parent::removeUsuarioUsuariocategoria($usuarioUsuariocategoria);
    }

    /**
     * {@inheritDoc}
     */
    public function getImportacions(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getImportacions', []);

        return parent::getImportacions();
    }

    /**
     * {@inheritDoc}
     */
    public function addImportacion(\App\Entity\Importacion $importacion): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addImportacion', [$importacion]);

        return parent::addImportacion($importacion);
    }

    /**
     * {@inheritDoc}
     */
    public function removeImportacion(\App\Entity\Importacion $importacion): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeImportacion', [$importacion]);

        return parent::removeImportacion($importacion);
    }

    /**
     * {@inheritDoc}
     */
    public function getVigenciaContratos(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getVigenciaContratos', []);

        return parent::getVigenciaContratos();
    }

    /**
     * {@inheritDoc}
     */
    public function setVigenciaContratos(?int $vigenciaContratos): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setVigenciaContratos', [$vigenciaContratos]);

        return parent::setVigenciaContratos($vigenciaContratos);
    }

    /**
     * {@inheritDoc}
     */
    public function getCuentaMaterias(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCuentaMaterias', []);

        return parent::getCuentaMaterias();
    }

    /**
     * {@inheritDoc}
     */
    public function addCuentaMateria(\App\Entity\CuentaMateria $cuentaMateria): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addCuentaMateria', [$cuentaMateria]);

        return parent::addCuentaMateria($cuentaMateria);
    }

    /**
     * {@inheritDoc}
     */
    public function removeCuentaMateria(\App\Entity\CuentaMateria $cuentaMateria): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeCuentaMateria', [$cuentaMateria]);

        return parent::removeCuentaMateria($cuentaMateria);
    }

    /**
     * {@inheritDoc}
     */
    public function getJuzgadoCuentas(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getJuzgadoCuentas', []);

        return parent::getJuzgadoCuentas();
    }

    /**
     * {@inheritDoc}
     */
    public function addJuzgadoCuenta(\App\Entity\JuzgadoCuenta $juzgadoCuenta): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addJuzgadoCuenta', [$juzgadoCuenta]);

        return parent::addJuzgadoCuenta($juzgadoCuenta);
    }

    /**
     * {@inheritDoc}
     */
    public function removeJuzgadoCuenta(\App\Entity\JuzgadoCuenta $juzgadoCuenta): \App\Entity\Cuenta
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeJuzgadoCuenta', [$juzgadoCuenta]);

        return parent::removeJuzgadoCuenta($juzgadoCuenta);
    }

}
