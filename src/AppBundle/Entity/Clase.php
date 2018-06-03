<?php

namespace AppBundle\Entity;

/**
 * Clase
 */
class Clase
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $hora;

    /**
     * @var string
     */
    private $dia;

    /**
     * @var boolean
     */
    private $estado;

    /**
     * @var integer
     */
    private $aforo;

    /**
     * @var string
     */
    private $descripcion;

    /**
     * @var \AppBundle\Entity\Actividad
     */
    private $actividad;

    /**
     * @var \AppBundle\Entity\Profesor
     */
    private $profesor;

    /**
     * @var \AppBundle\Entity\Sala
     */
    private $sala;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Clase
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
     * Set hora
     *
     * @param string $hora
     *
     * @return Clase
     */
    public function setHora($hora)
    {
        $this->hora = $hora;

        return $this;
    }

    /**
     * Get hora
     *
     * @return string
     */
    public function getHora()
    {
        return $this->hora;
    }

    /**
     * Set dia
     *
     * @param string $dia
     *
     * @return Clase
     */
    public function setDia($dia)
    {
        $this->dia = $dia;

        return $this;
    }

    /**
     * Get dia
     *
     * @return string
     */
    public function getDia()
    {
        return $this->dia;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Clase
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
     * Set aforo
     *
     * @param integer $aforo
     *
     * @return Clase
     */
    public function setAforo($aforo)
    {
        $this->aforo = $aforo;

        return $this;
    }

    /**
     * Get aforo
     *
     * @return integer
     */
    public function getAforo()
    {
        return $this->aforo;
    }

    /**
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Clase
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
     * Set actividad
     *
     * @param \AppBundle\Entity\Actividad $actividad
     *
     * @return Clase
     */
    public function setActividad(\AppBundle\Entity\Actividad $actividad = null)
    {
        $this->actividad = $actividad;

        return $this;
    }

    /**
     * Get actividad
     *
     * @return \AppBundle\Entity\Actividad
     */
    public function getActividad()
    {
        return $this->actividad;
    }

    /**
     * Set profesor
     *
     * @param \AppBundle\Entity\Profesor $profesor
     *
     * @return Clase
     */
    public function setProfesor(\AppBundle\Entity\Profesor $profesor = null)
    {
        $this->profesor = $profesor;

        return $this;
    }

    /**
     * Get profesor
     *
     * @return \AppBundle\Entity\Profesor
     */
    public function getProfesor()
    {
        return $this->profesor;
    }

    /**
     * Set sala
     *
     * @param \AppBundle\Entity\Sala $sala
     *
     * @return Clase
     */
    public function setSala(\AppBundle\Entity\Sala $sala = null)
    {
        $this->sala = $sala;

        return $this;
    }

    /**
     * Get sala
     *
     * @return \AppBundle\Entity\Sala
     */
    public function getSala()
    {
        return $this->sala;
    }
}
