<?php

namespace AppBundle\Entity;

/**
 * Ubigeo
 */
class Ubigeo
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $ubivid;

    /**
     * @var string
     */
    private $ubivdescrip;

    /**
     * @var string
     */
    private $ubivdescripcompleta;

    /**
     * @var string
     */
    private $ubicestado;


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
     * Set ubivid
     *
     * @param string $ubivid
     *
     * @return Ubigeo
     */
    public function setUbivid($ubivid)
    {
        $this->ubivid = $ubivid;

        return $this;
    }

    /**
     * Get ubivid
     *
     * @return string
     */
    public function getUbivid()
    {
        return $this->ubivid;
    }

    /**
     * Set ubivdescrip
     *
     * @param string $ubivdescrip
     *
     * @return Ubigeo
     */
    public function setUbivdescrip($ubivdescrip)
    {
        $this->ubivdescrip = $ubivdescrip;

        return $this;
    }

    /**
     * Get ubivdescrip
     *
     * @return string
     */
    public function getUbivdescrip()
    {
        return $this->ubivdescrip;
    }

    /**
     * Set ubivdescripcompleta
     *
     * @param string $ubivdescripcompleta
     *
     * @return Ubigeo
     */
    public function setUbivdescripcompleta($ubivdescripcompleta)
    {
        $this->ubivdescripcompleta = $ubivdescripcompleta;

        return $this;
    }

    /**
     * Get ubivdescripcompleta
     *
     * @return string
     */
    public function getUbivdescripcompleta()
    {
        return $this->ubivdescripcompleta;
    }

    /**
     * Set ubicestado
     *
     * @param string $ubicestado
     *
     * @return Ubigeo
     */
    public function setUbicestado($ubicestado)
    {
        $this->ubicestado = $ubicestado;

        return $this;
    }

    /**
     * Get ubicestado
     *
     * @return string
     */
    public function getUbicestado()
    {
        return $this->ubicestado;
    }
}
