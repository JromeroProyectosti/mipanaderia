<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Modulo extends \App\Entity\Modulo implements \Doctrine\ORM\Proxy\Proxy
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
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'nombre', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'ruta', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'nombreAlt', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'moduloPers', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'descripcion', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'menus'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'nombre', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'ruta', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'nombreAlt', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'moduloPers', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'descripcion', '' . "\0" . 'App\\Entity\\Modulo' . "\0" . 'menus'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Modulo $proxy) {
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
    public function setNombre(string $nombre): \App\Entity\Modulo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombre', [$nombre]);

        return parent::setNombre($nombre);
    }

    /**
     * {@inheritDoc}
     */
    public function getRuta(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getRuta', []);

        return parent::getRuta();
    }

    /**
     * {@inheritDoc}
     */
    public function setRuta(string $ruta): \App\Entity\Modulo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setRuta', [$ruta]);

        return parent::setRuta($ruta);
    }

    /**
     * {@inheritDoc}
     */
    public function getNombreAlt(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getNombreAlt', []);

        return parent::getNombreAlt();
    }

    /**
     * {@inheritDoc}
     */
    public function setNombreAlt(?string $nombreAlt): \App\Entity\Modulo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setNombreAlt', [$nombreAlt]);

        return parent::setNombreAlt($nombreAlt);
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
    public function getModuloPers(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getModuloPers', []);

        return parent::getModuloPers();
    }

    /**
     * {@inheritDoc}
     */
    public function addModuloPer(\App\Entity\ModuloPer $moduloPer): \App\Entity\Modulo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addModuloPer', [$moduloPer]);

        return parent::addModuloPer($moduloPer);
    }

    /**
     * {@inheritDoc}
     */
    public function removeModuloPer(\App\Entity\ModuloPer $moduloPer): \App\Entity\Modulo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeModuloPer', [$moduloPer]);

        return parent::removeModuloPer($moduloPer);
    }

    /**
     * {@inheritDoc}
     */
    public function getDescripcion(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getDescripcion', []);

        return parent::getDescripcion();
    }

    /**
     * {@inheritDoc}
     */
    public function setDescripcion(?string $descripcion): \App\Entity\Modulo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setDescripcion', [$descripcion]);

        return parent::setDescripcion($descripcion);
    }

    /**
     * {@inheritDoc}
     */
    public function getMenus(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMenus', []);

        return parent::getMenus();
    }

    /**
     * {@inheritDoc}
     */
    public function addMenu(\App\Entity\Menu $menu): \App\Entity\Modulo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addMenu', [$menu]);

        return parent::addMenu($menu);
    }

    /**
     * {@inheritDoc}
     */
    public function removeMenu(\App\Entity\Menu $menu): \App\Entity\Modulo
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeMenu', [$menu]);

        return parent::removeMenu($menu);
    }

}
