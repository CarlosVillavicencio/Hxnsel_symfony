<?php

namespace LoginBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class LoginController extends Controller {

    ///@brief Ruta login entorno producción
    /**
     * @Route("/loginV1", name="loginV1")
     */
    public function loginV1Action(Request $request) {
        $authenticationUtils = $this->get('security.authentication_utils');

        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('LoginBundle:Default:index.html.twig', array(
                    'last_username' => $lastUsername,
                    'error' => $error,
                    'ambiente' => $this->container->get('kernel')->getEnvironment(),
        ));
    }
    ///@brief Ruta logout entorno producción
    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request) {
        return new Response('');
    }

}
