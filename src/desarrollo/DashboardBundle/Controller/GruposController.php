<?php

namespace desarrollo\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\FosGroup;

class GruposController extends Controller
{
    public function indexAction(Request $request)
    {
//        $em = $this->getDoctrine()->getManager();
//        $data = $em->getRepository(FosGroup::class)->listar();
        $data = $this->getDoctrine()->getRepository(FosGroup::class)->listar();
        return $this->render('@Dashboard/Grupos/index.html.twig', array(
            'listado' => $data
        ));
    }

    public function editAction(Request $request, $id)
    {
        $data = $this->getDoctrine()->getRepository(FosGroup::class)->listarById($id);
        return $this->render('@Dashboard/Grupos/editar.html.twig', array(
            'data' => $data
        ));
    }
}