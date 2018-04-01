<?php

namespace LoginDevBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * FosGroup
 *
 * @ORM\Table(name="fos_group", uniqueConstraints={@ORM\UniqueConstraint(name="UNIQ_4B019DDB5E237E06", columns={"name"})})
 * @ORM\Entity
 */
class FosGroup
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
     * @ORM\Column(name="name", type="string", length=180, precision=0, scale=0, nullable=false, unique=false)
     */
    private $name;

    /**
     * @var array
     *
     * @ORM\Column(name="roles", type="array", precision=0, scale=0, nullable=false, unique=false)
     */
    private $roles;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="LoginDevBundle\Entity\FosUser", mappedBy="group")
     */
    private $user;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->user = new \Doctrine\Common\Collections\ArrayCollection();
    }

}

