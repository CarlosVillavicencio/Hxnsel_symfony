<?php

namespace LoginDevBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

///@brief Clase de la tabla accesousuario
/**
 * @ORM\Table(name="accesousuario")
 * @ORM\Entity(repositoryClass="LoginDevBundle\Repository\accesousuarioRepository")
 */
class accesousuario implements AdvancedUserInterface {

    /**
     * @var string
     *
     * @ORM\Column(name="idusuario", type="string", length=32, unique=true)
     * @ORM\Id
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="usuvcontrasena", type="string", length=32)
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="usuctipodoc", type="string", length=1)
     */
    private $usuctipodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="usuvnrodoc", type="string", length=15)
     */
    private $usuvnrodoc;

    /**
     * @var string
     *
     * @ORM\Column(name="usuvnombres", type="string", length=70)
     */
    private $usuvnombres;

    /**
     * @var string
     *
     * @ORM\Column(name="usuvapepat", type="string", length=45, nullable=true)
     */
    private $usuvapepat;

    /**
     * @var string
     *
     * @ORM\Column(name="usuvapemat", type="string", length=45, nullable=true)
     */
    private $usuvapemat;

    /**
     * @var string
     *
     * @ORM\Column(name="usuvemail", type="string", length=70, nullable=true)
     */
    private $usuvemail;

    /**
     * @var string
     *
     * @ORM\Column(name="usucestado", type="string", length=1)
     */
    private $usucestado;

    /**
     * @var string
     *
     * @ORM\Column(name="usucestadocontrasena", type="string", length=1, nullable=true)
     */
    private $usucestadocontrasena;

    /**
     * @var string
     *
     * @ORM\Column(name="usucentorno", type="string", length=1)
     */
    private $usucentorno;

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
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * Set username
     *
     * @param string $username
     *
     * @return accesousuario
     */
    public function setUsername($username) {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string
     */
    public function getUsername() {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     *
     * @return accesousuario
     */
    public function setPassword($password) {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string
     */
    public function getPassword() {
        return $this->password;
    }

    /**
     * Set usuctipodoc
     *
     * @param string $usuctipodoc
     *
     * @return accesousuario
     */
    public function setUsuctipodoc($usuctipodoc) {
        $this->usuctipodoc = $usuctipodoc;

        return $this;
    }

    /**
     * Get usuctipodoc
     *
     * @return string
     */
    public function getUsuctipodoc() {
        return $this->usuctipodoc;
    }

    /**
     * Set usuvnrodoc
     *
     * @param string $usuvnrodoc
     *
     * @return accesousuario
     */
    public function setUsuvnrodoc($usuvnrodoc) {
        $this->usuvnrodoc = $usuvnrodoc;

        return $this;
    }

    /**
     * Get usuvnrodoc
     *
     * @return string
     */
    public function getUsuvnrodoc() {
        return $this->usuvnrodoc;
    }

    /**
     * Set usuvnombres
     *
     * @param string $usuvnombres
     *
     * @return accesousuario
     */
    public function setUsuvnombres($usuvnombres) {
        $this->usuvnombres = $usuvnombres;

        return $this;
    }

    /**
     * Get usuvnombres
     *
     * @return string
     */
    public function getUsuvnombres() {
        return $this->usuvnombres;
    }

    /**
     * Set usuvapepat
     *
     * @param string $usuvapepat
     *
     * @return accesousuario
     */
    public function setUsuvapepat($usuvapepat) {
        $this->usuvapepat = $usuvapepat;

        return $this;
    }

    /**
     * Get usuvapepat
     *
     * @return string
     */
    public function getUsuvapepat() {
        return $this->usuvapepat;
    }

    /**
     * Set usuvapemat
     *
     * @param string $usuvapemat
     *
     * @return accesousuario
     */
    public function setUsuvapemat($usuvapemat) {
        $this->usuvapemat = $usuvapemat;

        return $this;
    }

    /**
     * Get usuvapemat
     *
     * @return string
     */
    public function getUsuvapemat() {
        return $this->usuvapemat;
    }

    /**
     * Set usuvemail
     *
     * @param string $usuvemail
     *
     * @return accesousuario
     */
    public function setUsuvemail($usuvemail) {
        $this->usuvemail = $usuvemail;

        return $this;
    }

    /**
     * Get usuvemail
     *
     * @return string
     */
    public function getUsuvemail() {
        return $this->usuvemail;
    }

    /**
     * Set usucestado
     *
     * @param string $usucestado
     *
     * @return accesousuario
     */
    public function setUsucestado($usucestado) {
        $this->usucestado = $usucestado;

        return $this;
    }

    /**
     * Get usucestado
     *
     * @return string
     */
    public function getUsucestado() {
        return $this->usucestado;
    }

    /**
     * Set usucestadocontrasena
     *
     * @param string $usucestadocontrasena
     *
     * @return accesousuario
     */
    public function setUsucestadocontrasena($usucestadocontrasena) {
        $this->usucestadocontrasena = $usucestadocontrasena;

        return $this;
    }

    /**
     * Get usucestadocontrasena
     *
     * @return string
     */
    public function getUsucestadocontrasena() {
        return $this->usucestadocontrasena;
    }

    /**
     * Set usucentorno
     *
     * @param string $usucentorno
     *
     * @return usucentorno
     */
    public function setUsucentorno($usucentorno) {
        $this->usucentorno = $usucentorno;

        return $this;
    }

    /**
     * Get usucentorno
     *
     * @return string
     */
    public function getUsucentorno() {
        return $this->usucentorno;
    }

    /**
     * Set fechaaudit
     *
     * @param \DateTime $fechaaudit
     *
     * @return accesousuario
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
     * @return accesousuario
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
     * @return accesousuario
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
     * @return accesousuario
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

    ///@brief Set de getPlainPassword necesario para usar AdvancedUserInterface
    public function getPlainPassword() {
        return $this->plainPassword;
    }

    ///@brief Set de plainPassword necesario para usar AdvancedUserInterface
    public function setPlainPassword($password) {
        $this->plainPassword = $password;
    }

//    public function getRoles() {
//        return array('ROLE_ADMIN');
//    }

    /**
     * @ORM\ManyToMany(targetEntity="accesorol", inversedBy="users")
     * @ORM\JoinTable(name="accesousurol",
     * joinColumns={@ORM\JoinColumn(name="idusuario", referencedColumnName="idusuario")},
     * inverseJoinColumns={@ORM\JoinColumn(name="idrol", referencedColumnName="idrol")}
     * )
     *
     */
    private $roles;

    ///@brief Costructor para $roles
    ///@return Retorn un array
    public function __construct() {
        $this->roles = new ArrayCollection();
    }

    ///@brief Obtiene los roles del usuario necesaria para usar AdvancedUserInterface
    public function getRoles() {
        //return array('');
        return $this->roles->toArray();
    }

    ///@brief Obtiene los roles del usuario
    ///@return Retorna los roles del usuario en un array
    public function getRoless() {
        $serializer = new Serializer(array(new GetSetMethodNormalizer()), array('json' => new
            JsonEncoder()));
        $json = $serializer->serialize($this->getRoles(), 'json');
        $json = json_decode($json, TRUE);
        return $json;
//        return $this->getRoles();
    }

    ///@brief Metodo que debe de implementar el Entity para usar AdvancedUserInterface
    public function getSalt() {
        // The bcrypt algorithm doesn't require a separate salt.
        // You *may* need a real salt if you choose a different encoder.
        return null;
    }

    ///@brief Limpiar inforamción sensible de las credenciales
    public function eraseCredentials() {
        
    }

    ///@brief Verifica si la cuenta ah expirado
    public function isAccountNonExpired() {
        return $this->usucestado;
    }

    ///@brief Verifica si la cuenta no esta bloqueada
    public function isAccountNonLocked() {
        return $this->usucestado;
    }

    ///@brief Verifica si las credenciales no han expirado
    public function isCredentialsNonExpired() {
        return $this->usucestado;
    }

    ///@brief Verifica si la cuenta esta activa
    public function isEnabled() {
        return $this->usucestado;
    }

}
