<?php

namespace AppBundle\Entity;

/**
 * Pais
 */
class Pais
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $paivnombre;

    /**
     * @var string
     */
    private $paiestado;


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
     * Set paivnombre
     *
     * @param string $paivnombre
     *
     * @return Pais
     */
    public function setPaivnombre($paivnombre)
    {
        $this->paivnombre = $paivnombre;

        return $this;
    }

    /**
     * Get paivnombre
     *
     * @return string
     */
    public function getPaivnombre()
    {
        return $this->paivnombre;
    }

    /**
     * Set paiestado
     *
     * @param string $paiestado
     *
     * @return Pais
     */
    public function setPaiestado($paiestado)
    {
        $this->paiestado = $paiestado;

        return $this;
    }

    /**
     * Get paiestado
     *
     * @return string
     */
    public function getPaiestado()
    {
        return $this->paiestado;
    }
}

