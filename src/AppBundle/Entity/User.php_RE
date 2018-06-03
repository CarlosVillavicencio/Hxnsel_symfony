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
     *
     * @ORM\Column(name="id", type="integer", precision=0, scale=0, nullable=false, unique=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
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
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

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
     * @var string
     */
    private $themeDashboard;


    /**
     * Set themeDashboard
     *
     * @param string $themeDashboard
     *
     * @return FosUser
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
}
