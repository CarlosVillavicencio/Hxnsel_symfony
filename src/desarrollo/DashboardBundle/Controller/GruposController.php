<?php

namespace desarrollo\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class GruposController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('@Dashboard/Grupos/index.html.twig', array(
//            'locale' => $this->get('translator')->getLocale(),
        ));
    }
}