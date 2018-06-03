<?php

namespace AppBundle\Entity;

/**
 * Ingresos
 */
class Ingresos
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
    private $precio;

    /**
     * @var \DateTime
     */
    private $fechaRegistro;

    /**
     * @var \DateTime
     */
    private $fechaModificacion;

    /**
     * @var boolean
     */
    private $estado;

    /**
     * @var \AppBundle\Entity\TipoIngresoEgreso
     */
    private $tipoIngresoEgreso;

    /**
     * @var \AppBundle\Entity\FosUser
     */
    private $fosUser;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Ingresos
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
     * @return Ingresos
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
     * @return Ingresos
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
     * @return Ingresos
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
     * Set precio
     *
     * @param string $precio
     *
     * @return Ingresos
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get precio
     *
     * @return string
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     *
     * @return Ingresos
     */
    public function setFechaRegistro($fechaRegistro)
    {
        $this->fechaRegistro = $fechaRegistro;

        return $this;
    }

    /**
     * Get fechaRegistro
     *
     * @return \DateTime
     */
    public function getFechaRegistro()
    {
        return $this->fechaRegistro;
    }

    /**
     * Set fechaModificacion
     *
     * @param \DateTime $fechaModificacion
     *
     * @return Ingresos
     */
    public function setFechaModificacion($fechaModificacion)
    {
        $this->fechaModificacion = $fechaModificacion;

        return $this;
    }

    /**
     * Get fechaModificacion
     *
     * @return \DateTime
     */
    public function getFechaModificacion()
    {
        return $this->fechaModificacion;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Ingresos
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
     * Set tipoIngresoEgreso
     *
     * @param \AppBundle\Entity\TipoIngresoEgreso $tipoIngresoEgreso
     *
     * @return Ingresos
     */
    public function setTipoIngresoEgreso(\AppBundle\Entity\TipoIngresoEgreso $tipoIngresoEgreso = null)
    {
        $this->tipoIngresoEgreso = $tipoIngresoEgreso;

        return $this;
    }

    /**
     * Get tipoIngresoEgreso
     *
     * @return \AppBundle\Entity\TipoIngresoEgreso
     */
    public function getTipoIngresoEgreso()
    {
        return $this->tipoIngresoEgreso;
    }

    /**
     * Set fosUser
     *
     * @param \AppBundle\Entity\FosUser $fosUser
     *
     * @return Ingresos
     */
    public function setFosUser(\AppBundle\Entity\FosUser $fosUser = null)
    {
        $this->fosUser = $fosUser;

        return $this;
    }

    /**
     * Get fosUser
     *
     * @return \AppBundle\Entity\FosUser
     */
    public function getFosUser()
    {
        return $this->fosUser;
    }
}
