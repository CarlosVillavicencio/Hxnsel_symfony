<?php

namespace LoginDevBundle\Security;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Core\Exception\BadCredentialsException;
use Symfony\Component\Security\Core\Exception\AuthenticationException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Guard\Authenticator\AbstractFormLoginAuthenticator;
use Symfony\Component\Security\Core\Security;

///@brief Esta función es un proveedor de secutity para el login
class FormLoginAuthenticator extends AbstractFormLoginAuthenticator {

    private $router;
    private $encoder;

    ///@brief Constructor de FormLoginAuthenticator
    public function __construct(RouterInterface $router, UserPasswordEncoderInterface $encoder) {
        $this->router = $router;
        $this->encoder = $encoder;
    }

    ///@brief Obtener credenciales ingresadas en el login
    public function getCredentials(Request $request) {
        if ($request->getPathInfo() != '/login_checkV1_dev') {
            return;
        }
        $username = $request->request->get('_username');
        $request->getSession()->set(Security::LAST_USERNAME, $username);
        $password = $request->request->get('_password');

        return [
            'username' => $username,
            'password' => $password,
        ];
    }

    ///@brief Obtiene el usuario ingresado en el login
    public function getUser($credentials, UserProviderInterface $userProvider) {
        $username = $credentials['username'];
        return $userProvider->loadUserByUsername($username);
    }

    ///@brief Revisa si las credenciales ingresadas en el login son correctas
    public function checkCredentials($credentials, UserInterface $user) {
        $plainPassword = $credentials['password'];
        if ($this->encoder->isPasswordValid($user, $plainPassword)) {
            return true;
        }
        throw new BadCredentialsException();
    }

    ///@brief En caso de que la autenticacion sea correcta redirige a la ruta por defecto o a la ruta que se intentó acceder antes de loguearse
    public function onAuthenticationSuccess(Request $request, TokenInterface $token, $providerKey) {
        $url = $request->getSession()->get('_security.main.target_path');
        if (!$url) {
            $url = $this->router->generate('_AppBundle_homepage');
        }
        return new RedirectResponse($url);
    }

    ///@brief En caso de fallar la autenticación redirige al login
    public function onAuthenticationFailure(Request $request, AuthenticationException $exception) {
        $request->getSession()->set(Security::AUTHENTICATION_ERROR, $exception);
        $url = $this->router->generate('loginV1_dev');
        return new RedirectResponse($url);
    }

    ///@brief Genera la ruta del login
    protected function getLoginUrl() {
        return $this->router->generate('loginV1_dev');
    }

    ///@brief genera y redirige a laruta por defecto
    protected function getDefaultSuccessRedirectUrl() {
        return $this->router->generate('_AppBundle_homepage');
    }

    ///@brief Soporte recuerdame desactivado
    public function supportsRememberMe() {
        return false;
    }

}
