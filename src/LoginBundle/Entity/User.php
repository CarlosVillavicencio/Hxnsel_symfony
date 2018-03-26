<?php

namespace LoginBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\AdvancedUserInterface;
use Symfony\Component\Validator\Constraints as Assert;

///@brief Se define la entidad user
/**
 * User
 *
 * @ORM\Table(name="user")
 * @ORM\Entity(repositoryClass="LoginBundle\Repository\UserRepository")
 */
class User implements AdvancedUserInterface {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=255)
     * @Assert\NotBlank()
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=64)
     * @Assert\NotBlank()
     */
    private $password;

    /**
     * @var int
     *
     * @ORM\Column(name="roles", type="json_array")
     */
    private $roles = array();

    /**
     * @var int
     *
     * @ORM\Column(name="estado", type="integer", length=1)
     */
    private $estado;

    /**
     * @Assert\NotBlank()
     * @Assert\Length(max=4096)
     */
    private $plainPassword;

    /**
     * Get id
     *
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     *
     * @return User
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
     * @return User
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
     * Get roles
     *
     * @return string
     */
    public function getRoles() {
        return $this->roles;
    }

    /**
     * Set roles
     *
     * @param string $roles
     *
     * @return Roles
     */
    public function setRoles(array $roles) {
        $this->roles->$roles;

        return $this;
    }

    /**
     * Get estado
     *
     * @return int
     */
    public function getEstado() {
        return $this->estado;
    }

    /**
     * Set estado
     *
     * @param int $estado
     *
     * @return Estado
     */
    public function setEstado($estado) {
        $this->estado->$estado;

        return $this;
    }
    ///@brief Set de getPlainPassword necesario para usar AdvancedUserInterface
    public function getPlainPassword() {
        return $this->plainPassword;
    }
    ///@brief Set de plainPassword necesario para usar AdvancedUserInterface
    public function setPlainPassword($password) {
        $this->plainPassword = $password;
    }

    //Metodos que debe de implementar el Entity por UserInterface
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
        return $this->estado;
    }
    ///@brief Verifica si la cuenta no esta bloqueada
    public function isAccountNonLocked() {
        return $this->estado;
    }
    ///@brief Verifica si las credenciales no han expirado
    public function isCredentialsNonExpired() {
        return $this->estado;
    }
    ///@brief Verifica si la cuenta esta activa
    public function isEnabled() {
        return $this->estado;
    }

}
