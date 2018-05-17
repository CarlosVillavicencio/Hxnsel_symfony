<?php

namespace desarrollo\DashboardBundle\Controller;

use AppBundle\Entity\FosUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    public function indexAction(Request $request)
    {
//        return $this->render('@Dashboard/Default/index.html.twig', array(
//        $getuser = $this->getUser();
        $id = $this->getUser()->getId();
        $data = $this->getDoctrine()->getRepository(FosUser::class)->listarById($id);
//        $referer = $request->headers->get('referer');
        return $this->render(':Dashboard/Default:index.html.twig', array(
//            'locale' => $this->get('translator')->getLocale(),
            'data' => $data
        ));
    }
}