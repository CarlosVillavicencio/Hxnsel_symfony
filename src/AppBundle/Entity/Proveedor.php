<?php

namespace AppBundle\Entity;

/**
 * Proveedor
 */
class Proveedor
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nombre;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $telefonoFijo1;

    /**
     * @var string
     */
    private $telefonoFijo2;

    /**
     * @var string
     */
    private $telefonoMobil;

    /**
     * @var string
     */
    private $correo;

    /**
     * @var boolean
     */
    private $estado;

    /**
     * @var string
     */
    private $numCuentaBanco;

    /**
     * @var \AppBundle\Entity\Banco
     */
    private $banco;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Proveedor
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Proveedor
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Proveedor
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;

        return $this;
    }

    /**
     * Get direccion
     *
     * @return string
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * Set telefonoFijo1
     *
     * @param string $telefonoFijo1
     *
     * @return Proveedor
     */
    public function setTelefonoFijo1($telefonoFijo1)
    {
        $this->telefonoFijo1 = $telefonoFijo1;

        return $this;
    }

    /**
     * Get telefonoFijo1
     *
     * @return string
     */
    public function getTelefonoFijo1()
    {
        return $this->telefonoFijo1;
    }

    /**
     * Set telefonoFijo2
     *
     * @param string $telefonoFijo2
     *
     * @return Proveedor
     */
    public function setTelefonoFijo2($telefonoFijo2)
    {
        $this->telefonoFijo2 = $telefonoFijo2;

        return $this;
    }

    /**
     * Get telefonoFijo2
     *
     * @return string
     */
    public function getTelefonoFijo2()
    {
        return $this->telefonoFijo2;
    }

    /**
     * Set telefonoMobil
     *
     * @param string $telefonoMobil
     *
     * @return Proveedor
     */
    public function setTelefonoMobil($telefonoMobil)
    {
        $this->telefonoMobil = $telefonoMobil;

        return $this;
    }

    /**
     * Get telefonoMobil
     *
     * @return string
     */
    public function getTelefonoMobil()
    {
        return $this->telefonoMobil;
    }

    /**
     * Set correo
     *
     * @param string $correo
     *
     * @return Proveedor
     */
    public function setCorreo($correo)
    {
        $this->correo = $correo;

        return $this;
    }

    /**
     * Get correo
     *
     * @return string
     */
    public function getCorreo()
    {
        return $this->correo;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Proveedor
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    /**
     * Get estado
     *
     * @return boolean
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * Set numCuentaBanco
     *
     * @param string $numCuentaBanco
     *
     * @return Proveedor
     */
    public function setNumCuentaBanco($numCuentaBanco)
    {
        $this->numCuentaBanco = $numCuentaBanco;

        return $this;
    }

    /**
     * Get numCuentaBanco
     *
     * @return string
     */
    public function getNumCuentaBanco()
    {
        return $this->numCuentaBanco;
    }

    /**
     * Set banco
     *
     * @param \AppBundle\Entity\Banco $banco
     *
     * @return Proveedor
     */
    public function setBanco(\AppBundle\Entity\Banco $banco = null)
    {
        $this->banco = $banco;

        return $this;
    }

    /**
     * Get banco
     *
     * @return \AppBundle\Entity\Banco
     */
    public function getBanco()
    {
        return $this->banco;
    }
}
