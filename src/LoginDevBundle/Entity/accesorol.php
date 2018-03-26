<?php

namespace LoginDevBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\RoleInterface;
use Doctrine\Common\Collections\ArrayCollection;

///@brief Clase de la tabla accesorol
/**
 * @ORM\Table(name="accesorol")
 * @ORM\Entity(repositoryClass="LoginDevBundle\Repository\accesorolRepository")
 */
class accesorol implements RoleInterface {

    /**
     * @var int
     *
     * @ORM\Column(name="idrol", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue
     */
    private $idrol;

    /**
     * @var string
     *
     * @ORM\Column(name="rolvnombre", type="string", length=70, unique=true)
     */
    private $rolvnombre;

    /**
     * @var string
     *
     * @ORM\Column(name="rolvdescrip", type="string", length=4000, nullable=true)
     */
    private $rolvdescrip;

    /**
     * @var string
     *
     * @ORM\Column(name="rolcestado", type="string", length=1)
     */
    private $rolcestado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaaudit", type="datetime")
     */
    private $fechaaudit;

    /**
     * @var string
     *
     * @ORM\Column(name="usuarioaudit", type="string", length=32)
     */
    private $usuarioaudit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaauditult", type="datetime")
     */
    private $fechaauditult;

    /**
     * @var string
     *
     * @ORM\Column(name="usuarioauditult", type="string", length=32)
     */
    private $usuarioauditult;

    /**
     * Set idrol
     *
     * @param integer $idrol
     *
     * @return accesorol
     */
    public function setIdrol($idrol) {
        $this->idrol = $idrol;

        return $this;
    }

    /**
     * Get idrol
     *
     * @return integer
     */
    public function getIdrol() {
        return $this->idrol;
    }

    /**
     * Set rolvnombre
     *
     * @param string $rolvnombre
     *
     * @return accesorol
     */
    public function setRolvnombre($rolvnombre) {
        $this->rolvnombre = $rolvnombre;

        return $this;
    }

    /**
     * Get rolvnombre
     *
     * @return string
     */
    public function getRolvnombre() {
        return $this->rolvnombre;
    }

    /**
     * Set rolvdescrip
     *
     * @param string $rolvdescrip
     *
     * @return accesorol
     */
    public function setRolvdescrip($rolvdescrip) {
        $this->rolvdescrip = $rolvdescrip;

        return $this;
    }

    /**
     * Get rolvdescrip
     *
     * @return string
     */
    public function getRolvdescrip() {
        return $this->rolvdescrip;
    }

    /**
     * Set rolcestado
     *
     * @param string $rolcestado
     *
     * @return accesorol
     */
    public function setRolcestado($rolcestado) {
        $this->rolcestado = $rolcestado;

        return $this;
    }

    /**
     * Get rolcestado
     *
     * @return string
     */
    public function getRolcestado() {
        return $this->rolcestado;
    }

    /**
     * Set fechaaudit
     *
     * @param \DateTime $fechaaudit
     *
     * @return accesorol
     */
    public function setFechaaudit($fechaaudit) {
        $this->fechaaudit = $fechaaudit;

        return $this;
    }

    /**
     * Get fechaaudit
     *
     * @return \DateTime
     */
    public function getFechaaudit() {
        return $this->fechaaudit;
    }

    /**
     * Set usuarioaudit
     *
     * @param string $usuarioaudit
     *
     * @return accesorol
     */
    public function setUsuarioaudit($usuarioaudit) {
        $this->usuarioaudit = $usuarioaudit;

        return $this;
    }

    /**
     * Get usuarioaudit
     *
     * @return string
     */
    public function getUsuarioaudit() {
        return $this->usuarioaudit;
    }

    /**
     * Set fechaauditult
     *
     * @param \DateTime $fechaauditult
     *
     * @return accesorol
     */
    public function setFechaauditult($fechaauditult) {
        $this->fechaauditult = $fechaauditult;

        return $this;
    }

    /**
     * Get fechaauditult
     *
     * @return \DateTime
     */
    public function getFechaauditult() {
        return $this->fechaauditult;
    }

    /**
     * Set usuarioauditult
     *
     * @param string $usuarioauditult
     *
     * @return accesorol
     */
    public function setUsuarioauditult($usuarioauditult) {
        $this->usuarioauditult = $usuarioauditult;

        return $this;
    }

    /**
     * Get usuarioauditult
     *
     * @return string
     */
    public function getUsuarioauditult() {
        return $this->usuarioauditult;
    }

    /**
     * @ORM\ManyToMany(targetEntity="accesousuario", mappedBy="roles")
     */
    private $users;

    ///@brief Costructor para $users
    ///@return Retorn un array
    public function __construct() {
        $this->users = new ArrayCollection();
    }

    /**
     * @see RoleInterface
     */
    public function getRole() {
        return $this->rolvnombre;
    }

}
