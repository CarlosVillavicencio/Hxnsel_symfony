<?php

namespace LoginDevBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;

///@brief Clase que contiene las rutas necesarias para el logueo del usuario
class LoginDevController extends Controller {

    ///@brief Ruta del login en el entorno dev
    /**
     * @Route("/loginV1_dev", name="loginV1_dev")
     */
    public function loginV1_devAction(Request $request) {
        $user = '';
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->getUser()->getUsername();
        }
        if ($user !== '') {
            echo 'Hay un usuario conectado: ' . $user . '<br>';
            echo '<a href="' . $this->generateUrl('_AppBundle_homepage') . '">Ir a la pagina principal</a>';
            exit();
        }
        $helper = $this->get('security.authentication_utils');

        return $this->render(
                        'LoginDevBundle:Default:index.html.twig', array(
                    'last_username' => $helper->getLastUsername(),
                    'error' => $helper->getLastAuthenticationError(),
                    'ambiente' => $this->container->get('kernel')->getEnvironment(),
                        )
        );
    }

    ///@brief Ruta para que el servicio verifique el estado de la sessión
    /**
     * @Route("/login_checkV1_dev", name="security_login_checkV1_dev")
     */
    public function loginCheckAction() {
        //will never be executed
        //return new Response('');
    }

    ///@brief Ruta para el cierre de sessión
    /**
     * @Route("/logout", name="logout")
     */
    public function logoutAction(Request $request) {
        //return new Response('');
    }

    ///@brief Redirecciona a la ruta por defecto del sistema
    ///@note como esta es la raiz que se suele llamar al escribir la url principal y no tiene prefijo alguno redirecciona a la ruta por defecto
     /**
     * @Route("/", name="redirect_to_page_ini")
     */
    public function RedirectToPageIniAction() {
        return $this->redirectToRoute('_AppBundle_homepage');
    }

}
