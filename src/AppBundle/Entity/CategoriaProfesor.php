<?php

namespace AppBundle\Entity;

/**
 * CategoriaProfesor
 */
class CategoriaProfesor
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var string
     */
    private $sueldo;

    /**
     * @var boolean
     */
    private $estado;


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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return CategoriaProfesor
     */
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get descripcion
     *
     * @return string
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set sueldo
     *
     * @param string $sueldo
     *
     * @return CategoriaProfesor
     */
    public function setSueldo($sueldo)
    {
        $this->sueldo = $sueldo;

        return $this;
    }

    /**
     * Get sueldo
     *
     * @return string
     */
    public function getSueldo()
    {
        return $this->sueldo;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return CategoriaProfesor
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
}
