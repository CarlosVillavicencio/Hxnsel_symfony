<?php

namespace desarrollo\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    public function indexAction(Request $request)
    {
        return $this->render('@Dashboard/Default/index.html.twig', array(
//            'locale' => $this->get('translator')->getLocale(),
        ));
    }
}