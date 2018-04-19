<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

///@brief Esta clase contiene todas las rutas de AppBundle cuyo prefijo es /inicio
class DefaultController extends Controller
{

    ///@brief Esta es la ruta principal
    ///@return Devuelve la página por defecto de symfony tras la instalación
    public function indexAction(Request $request)
    {
        $domain = $this->getParameter('domain');
        $dash = $this->getParameter('subdomain.dash');
        $portal = $this->getParameter('subdomain.portal');
        $url = '';
        if ($request->getHttpHost() == $dash . '.' . $domain) {
            $url = $this->generateUrl('dashboard_index');
        } elseif ($request->getHttpHost() == $portal . '.' . $domain) {
            $url = '';
        } else {
            $url = '';
        }
        if ($url == '') {
            echo 'falta definir la url para la redireccion!!<br>';
            echo 'revisar AppBundle DefaultController';
            exit();
        }
        return $this->redirect($url);
//        $_locale = $this->get('translator')->getLocale();
//        return $this->redirectToRoute('dashboard_index', array('_locale' => $_locale));

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }

}
