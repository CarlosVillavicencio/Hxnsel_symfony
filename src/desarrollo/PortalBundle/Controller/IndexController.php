<?php

namespace desarrollo\PortalBundle\Controller;

use AppBundle\Entity\FosUser;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    public function indexAction(Request $request)
    {
//        $id = $this->getUser()->getId();
//        $data = $this->getDoctrine()->getRepository(FosUser::class)->listarById($id);
//        $referer = $request->headers->get('referer');
//        echo $request->getLocale();
//        exit();
        return $this->render(':Portal/Default:index.html.twig', array(
//            'locale' => $this->get('translator')->getLocale(),
//            'data' => $data
        ));
    }
}