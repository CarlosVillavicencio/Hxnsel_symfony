<?php

namespace AppBundle\Entity;

/**
 * DetalleCierreCaja
 */
class DetalleCierreCaja
{
    /**
     * @var \DateTime
     */
    private $fechaRegistro;

    /**
     * @var string
     */
    private $total;

    /**
     * @var \AppBundle\Entity\CierreCaja
     */
    private $cierreCaja;

    /**
     * @var \AppBundle\Entity\Egresos
     */
    private $egresos;

    /**
     * @var \AppBundle\Entity\Ingresos
     */
    private $ingresos;


    /**
     * Set fechaRegistro
     *
     * @param \DateTime $fechaRegistro
     *
     * @return DetalleCierreCaja
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
     * Set total
     *
     * @param string $total
     *
     * @return DetalleCierreCaja
     */
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get total
     *
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set cierreCaja
     *
     * @param \AppBundle\Entity\CierreCaja $cierreCaja
     *
     * @return DetalleCierreCaja
     */
    public function setCierreCaja(\AppBundle\Entity\CierreCaja $cierreCaja = null)
    {
        $this->cierreCaja = $cierreCaja;

        return $this;
    }

    /**
     * Get cierreCaja
     *
     * @return \AppBundle\Entity\CierreCaja
     */
    public function getCierreCaja()
    {
        return $this->cierreCaja;
    }

    /**
     * Set egresos
     *
     * @param \AppBundle\Entity\Egresos $egresos
     *
     * @return DetalleCierreCaja
     */
    public function setEgresos(\AppBundle\Entity\Egresos $egresos = null)
    {
        $this->egresos = $egresos;

        return $this;
    }

    /**
     * Get egresos
     *
     * @return \AppBundle\Entity\Egresos
     */
    public function getEgresos()
    {
        return $this->egresos;
    }

    /**
     * Set ingresos
     *
     * @param \AppBundle\Entity\Ingresos $ingresos
     *
     * @return DetalleCierreCaja
     */
    public function setIngresos(\AppBundle\Entity\Ingresos $ingresos = null)
    {
        $this->ingresos = $ingresos;

        return $this;
    }

    /**
     * Get ingresos
     *
     * @return \AppBundle\Entity\Ingresos
     */
    public function getIngresos()
    {
        return $this->ingresos;
    }
}
