<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * User
 *
 * @ORM\Table(name="fos_user")
 * @ORM\Entity
 */
class User extends BaseUser
{
    /**
     * @var integer
     */
    protected $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Group")
     * @ORM\JoinTable(name="fos_user_user_group",
     *   joinColumns={
     *     @ORM\JoinColumn(name="user_id", referencedColumnName="id", nullable=true)
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="group_id", referencedColumnName="id", nullable=true)
     *   }
     * )
     */

    /**
     * @var string
     */
    protected $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    protected $themeDashboard;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    protected $groups;

    /**
     * Constructor
     */
    public function __construct()
    {
        parent::__construct();
        // your own logic
        $this->groups = new ArrayCollection();
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
     * Set firstName
     *
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Set lastName
     *
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get lastName
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set themeDashboard
     *
     * @param string $themeDashboard
     *
     * @return User
     */
    public function setThemeDashboard($themeDashboard)
    {
        $this->themeDashboard = $themeDashboard;

        return $this;
    }

    /**
     * Get themeDashboard
     *
     * @return string
     */
    public function getThemeDashboard()
    {
        return $this->themeDashboard;
    }

    /**
     * @var string
     */
    protected $dni;

    /**
     * @var \AppBundle\Entity\Ubigeo
     */
    protected $ubigeo;


    /**
     * Set dni
     *
     * @param string $dni
     *
     * @return User
     */
    public function setDni($dni)
    {
        $this->dni = $dni;

        return $this;
    }

    /**
     * Get dni
     *
     * @return string
     */
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Set ubigeo
     *
     * @param \AppBundle\Entity\Ubigeo $ubigeo
     *
     * @return User
     */
    public function setUbigeo(\AppBundle\Entity\Ubigeo $ubigeo = null)
    {
        $this->ubigeo = $ubigeo;

        return $this;
    }

    /**
     * Get ubigeo
     *
     * @return \AppBundle\Entity\Ubigeo
     */
    public function getUbigeo()
    {
        return $this->ubigeo;
    }
}
