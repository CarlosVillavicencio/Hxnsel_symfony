<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ubigeo
 *
 * @ORM\Table(name="ubigeo")
 * @ORM\Entity
 */
class Ubigeo
{
    /**
     * @var string
     *
     * @ORM\Column(name="id", type="string", length=6, precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="ubivdescrip", type="string", length=100, precision=0, scale=0, nullable=false, unique=false)
     */
    private $ubivdescrip;

    /**
     * @var string
     *
     * @ORM\Column(name="ubivdescripcompleta", type="string", length=1000, precision=0, scale=0, nullable=true, unique=false)
     */
    private $ubivdescripcompleta;

    /**
     * @var string
     *
     * @ORM\Column(name="ubicestado", type="string", length=1, precision=0, scale=0, nullable=false, unique=false)
     */
    private $ubicestado;


}

