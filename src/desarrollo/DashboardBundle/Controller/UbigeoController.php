<?php

namespace desarrollo\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\Ubigeo;

class UbigeoController extends Controller
{
    public function listarAction(Request $request, $provin_p_distri_d, $codigo_ubivid)
    {
        $tools = $this->get('herramientas');
        if (!$request->isXmlHttpRequest()) {
            return $tools->redirectToHome();
        }
        $data = $this->getDoctrine()->getRepository(Ubigeo::class)->listar($provin_p_distri_d, $codigo_ubivid);
        $array = array(
            'data' => $data
        );
        return $tools->jsonResponse($array);
    }
}