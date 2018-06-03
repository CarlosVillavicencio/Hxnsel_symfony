<?php

namespace AppBundle\Entity;

/**
 * Producto
 */
class Producto
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
     * @var integer
     */
    private $stock;

    /**
     * @var string
     */
    private $precioUnitVenta;

    /**
     * @var boolean
     */
    private $estado;

    /**
     * @var \DateTime
     */
    private $fechaVencimiento;

    /**
     * @var \AppBundle\Entity\TipoProducto
     */
    private $tipoProducto;


    /**
     * Set id
     *
     * @param integer $id
     *
     * @return Producto
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
     * Set descripcion
     *
     * @param string $descripcion
     *
     * @return Producto
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
     * Set stock
     *
     * @param integer $stock
     *
     * @return Producto
     */
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get stock
     *
     * @return integer
     */
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set precioUnitVenta
     *
     * @param string $precioUnitVenta
     *
     * @return Producto
     */
    public function setPrecioUnitVenta($precioUnitVenta)
    {
        $this->precioUnitVenta = $precioUnitVenta;

        return $this;
    }

    /**
     * Get precioUnitVenta
     *
     * @return string
     */
    public function getPrecioUnitVenta()
    {
        return $this->precioUnitVenta;
    }

    /**
     * Set estado
     *
     * @param boolean $estado
     *
     * @return Producto
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
     * Set fechaVencimiento
     *
     * @param \DateTime $fechaVencimiento
     *
     * @return Producto
     */
    public function setFechaVencimiento($fechaVencimiento)
    {
        $this->fechaVencimiento = $fechaVencimiento;

        return $this;
    }

    /**
     * Get fechaVencimiento
     *
     * @return \DateTime
     */
    public function getFechaVencimiento()
    {
        return $this->fechaVencimiento;
    }

    /**
     * Set tipoProducto
     *
     * @param \AppBundle\Entity\TipoProducto $tipoProducto
     *
     * @return Producto
     */
    public function setTipoProducto(\AppBundle\Entity\TipoProducto $tipoProducto = null)
    {
        $this->tipoProducto = $tipoProducto;

        return $this;
    }

    /**
     * Get tipoProducto
     *
     * @return \AppBundle\Entity\TipoProducto
     */
    public function getTipoProducto()
    {
        return $this->tipoProducto;
    }
}
