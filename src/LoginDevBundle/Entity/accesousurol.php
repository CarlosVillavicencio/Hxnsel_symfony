<?php

namespace LoginDevBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

///@brief Clase de la tabla accesousurol
/**
 * @ORM\Table(name="accesousurol")
 * @ORM\Entity(repositoryClass="LoginDevBundle\Repository\accesousurolRepository")
 */
class accesousurol {

    /**
     * @var string
     *
     * @ORM\Column(name="idusuario", type="string", length=32)
     * @ORM\Id
     */
    private $idusuario;

    /**
     * @var int
     *
     * @ORM\Column(name="idrol", type="integer")
     */
    private $idrol;

    /**
     * @var string
     *
     * @ORM\Column(name="usrcestado", type="string", length=1)
     */
    private $usrcestado;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaaudit", type="datetime", nullable=true)
     */
    private $fechaaudit;

    /**
     * @var string
     *
     * @ORM\Column(name="usuarioaudit", type="string", length=32, nullable=true)
     */
    private $usuarioaudit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="fechaauditult", type="datetime", nullable=true)
     */
    private $fechaauditult;

    /**
     * @var string
     *
     * @ORM\Column(name="usuarioauditult", type="string", length=32, nullable=true)
     */
    private $usuarioauditult;

    /**
     * Set idusuario
     *
     * @param string $idusuario
     *
     * @return accesousurol
     */
    public function setIdusuario($idusuario) {
        $this->idusuario = $idusuario;

        return $this;
    }

    /**
     * Get idusuario
     *
     * @return string
     */
    public function getIdusuario() {
        return $this->idusuario;
    }

    /**
     * Set idrol
     *
     * @param integer $idrol
     *
     * @return accesousurol
     */
    public function setIdrol($idrol) {
        $this->idrol = $idrol;

        return $this;
    }

    /**
     * Get idrol
     *
     * @return int
     */
    public function getIdrol() {
        return $this->idrol;
    }

    /**
     * Set usrcestado
     *
     * @param string $usrcestado
     *
     * @return accesousurol
     */
    public function setUsrcestado($usrcestado) {
        $this->usrcestado = $usrcestado;

        return $this;
    }

    /**
     * Get usrcestado
     *
     * @return string
     */
    public function getUsrcestado() {
        return $this->usrcestado;
    }

    /**
     * Set fechaaudit
     *
     * @param \DateTime $fechaaudit
     *
     * @return accesousurol
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
     * @return accesousurol
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
     * @return accesousurol
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
     * @return accesousurol
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

}
