<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pais
 *
 * @ORM\Table(name="pais")
 * @ORM\Entity
 */
class Pais
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="paivnombre", type="string", length=100, precision=0, scale=0, nullable=true, unique=false)
     */
    private $paivnombre;

    /**
     * @var string
     *
     * @ORM\Column(name="paiestado", type="string", length=1, precision=0, scale=0, nullable=true, unique=false)
     */
    private $paiestado;


}

