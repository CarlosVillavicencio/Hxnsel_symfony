<?php

namespace desarrollo\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    public function indexAction(Request $request)
    {
//        dump($this->getParameter('app.locales'));
//        exit();
        return $this->render('@Dashboard/Default/index.html.twig', array(
            'locale' => $this->get('translator')->getLocale(),
            'locales' => $this->getParameter('app.locales'),
        ));
        return $this->render('@Gym/security/login.html.twig', array(
            'last_username' => $lastUsername,
            'error' => $error,
        ));
        $translated = $this->get('translator')->trans('prueba');
        $content = '<html><head></head><body>';
        $content .= 'traduccion<br>';
        $content .= $translated . ' <br>';
        $locale = $request->getLocale();
        $content .= 'locale ' . $locale . ' <br>';
        $_locale = $this->get('translator')->getLocale();
        $content .= '_locale ' . $_locale . ' <br>';
        $url = $this->generateUrl('dashboard_index', array('_locale' => $locale));
        $content .= 'url ' . $url . ' <br>';
        $content .= '</body></html>';
        $response = new Response($content);
        return new Response($response);
    }
}