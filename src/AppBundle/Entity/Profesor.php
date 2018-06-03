<?php

namespace AppBundle\Entity;

/**
 * Profesor
 */
class Profesor
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
    private $apellidos;

    /**
     * @var string
     */
    private $dni;

    /**
     * @var string
     */
    private $direccion;

    /**
     * @var string
     */
    private $telefonoFijo;

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
    private $ruc;

    /**
     * @var string
     */
    private $numCuenta;

    /**
     * @var \AppBundle\Entity\Banco
     */
    private $banco;

    /**
     * @var \AppBundle\Entity\CategoriaProfesor
     */
    private $categoriaProfesor;

    /**
     * @var \AppBundle\Entity\Ubigeo
     */
    private $ubigeo;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Profesor
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
     * @return Profesor
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
     * Set apellidos
     *
     * @param string $apellidos
     *
     * @return Profesor
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;

        return $this;
    }

    /**
     * Get apellidos
     *
     * @return string
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return Profesor
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set direccion
     *
     * @param string $direccion
     *
     * @return Profesor
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
     * Set telefonoFijo
     *
     * @param string $telefonoFijo
     *
     * @return Profesor
     */
    public function setTelefonoFijo($telefonoFijo)
    {
        $this->telefonoFijo = $telefonoFijo;

        return $this;
    }

    /**
     * Get telefonoFijo
     *
     * @return string
     */
    public function getTelefonoFijo()
    {
        return $this->telefonoFijo;
    }

    /**
     * Set telefonoMobil
     *
     * @param string $telefonoMobil
     *
     * @return Profesor
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
     * @return Profesor
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
     * @return Profesor
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
     * Set ruc
     *
     * @param string $ruc
     *
     * @return Profesor
     */
    public function setRuc($ruc)
    {
        $this->ruc = $ruc;

        return $this;
    }

    /**
     * Get ruc
     *
     * @return string
     */
    public function getRuc()
    {
        return $this->ruc;
    }

    /**
     * Set numCuenta
     *
     * @param string $numCuenta
     *
     * @return Profesor
     */
    public function setNumCuenta($numCuenta)
    {
        $this->numCuenta = $numCuenta;

        return $this;
    }

    /**
     * Get numCuenta
     *
     * @return string
     */
    public function getNumCuenta()
    {
        return $this->numCuenta;
    }

    /**
     * Set banco
     *
     * @param \AppBundle\Entity\Banco $banco
     *
     * @return Profesor
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

    /**
     * Set categoriaProfesor
     *
     * @param \AppBundle\Entity\CategoriaProfesor $categoriaProfesor
     *
     * @return Profesor
     */
    public function setCategoriaProfesor(\AppBundle\Entity\CategoriaProfesor $categoriaProfesor = null)
    {
        $this->categoriaProfesor = $categoriaProfesor;

        return $this;
    }

    /**
     * Get categoriaProfesor
     *
     * @return \AppBundle\Entity\CategoriaProfesor
     */
    public function getCategoriaProfesor()
    {
        return $this->categoriaProfesor;
    }

    /**
     * Set ubigeo
     *
     * @param \AppBundle\Entity\Ubigeo $ubigeo
     *
     * @return Profesor
     */
    public function setUbigeo(\AppBundle\Entity\Ubigeo $ubigeo = null)
    {
        $this->ubigeo = $ubigeo;

        return $this;
    }

    /**
     * Get ubigeo
     *
     * @return \AppBundle\Entity\Ubigeo
     */
    public function getUbigeo()
    {
        return $this->ubigeo;
    }
}
