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
//        echo $this->generateUrl('_AppBundle_homepage');
//        echo '<br>';
//        echo $request->getBaseUrl();
//        exit();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir') . '/..') . DIRECTORY_SEPARATOR,
        ]);
    }

}
