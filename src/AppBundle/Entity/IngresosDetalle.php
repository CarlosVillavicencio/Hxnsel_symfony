<?php

namespace AppBundle\Entity;

/**
 * IngresosDetalle
 */
class IngresosDetalle
{
    /**
     * @var string
     */
    private $precio;

    /**
     * @var integer
     */
    private $cantidad;

    /**
     * @var \DateTime
     */
    private $fechaInicio;

    /**
     * @var \DateTime
     */
    private $fechaFin;

    /**
     * @var boolean
     */
    private $estado;

    /**
     * @var \AppBundle\Entity\Ingresos
     */
    private $ingresos;

    /**
     * @var \AppBundle\Entity\Membresia
     */
    private $membresia;

    /**
     * @var \AppBundle\Entity\Producto
     */
    private $producto;


    /**
     * Set precio
     *
     * @param string $precio
     *
     * @return IngresosDetalle
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
     * Set cantidad
     *
     * @param integer $cantidad
     *
     * @return IngresosDetalle
     */
    public function setCantidad($cantidad)
    {
        $this->cantidad = $cantidad;

        return $this;
    }

    /**
     * Get cantidad
     *
     * @return integer
     */
    public function getCantidad()
    {
        return $this->cantidad;
    }

    /**
     * Set fechaInicio
     *
     * @param \DateTime $fechaInicio
     *
     * @return IngresosDetalle
     */
    public function setFechaInicio($fechaInicio)
    {
        $this->fechaInicio = $fechaInicio;

        return $this;
    }

    /**
     * Get fechaInicio
     *
     * @return \DateTime
     */
    public function getFechaInicio()
    {
        return $this->fechaInicio;
    }

    /**
     * Set fechaFin
     *
     * @param \DateTime $fechaFin
     *
     * @return IngresosDetalle
     */
    public function setFechaFin($fechaFin)
    {
        $this->fechaFin = $fechaFin;

        return $this;
    }

    /**
     * Get fechaFin
     *
     * @return \DateTime
     */
    public function getFechaFin()
    {
        return $this->fechaFin;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return IngresosDetalle
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
     * Set ingresos
     *
     * @param \AppBundle\Entity\Ingresos $ingresos
     *
     * @return IngresosDetalle
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

    /**
     * Set membresia
     *
     * @param \AppBundle\Entity\Membresia $membresia
     *
     * @return IngresosDetalle
     */
    public function setMembresia(\AppBundle\Entity\Membresia $membresia = null)
    {
        $this->membresia = $membresia;

        return $this;
    }

    /**
     * Get membresia
     *
     * @return \AppBundle\Entity\Membresia
     */
    public function getMembresia()
    {
        return $this->membresia;
    }

    /**
     * Set producto
     *
     * @param \AppBundle\Entity\Producto $producto
     *
     * @return IngresosDetalle
     */
    public function setProducto(\AppBundle\Entity\Producto $producto = null)
    {
        $this->producto = $producto;

        return $this;
    }

    /**
     * Get producto
     *
     * @return \AppBundle\Entity\Producto
     */
    public function getProducto()
    {
        return $this->producto;
    }
}
