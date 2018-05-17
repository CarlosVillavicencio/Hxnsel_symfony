<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\Translation\TranslatorInterface;
use Symfony\Component\Routing\RouterInterface;

class HerramientasService
{
    private $container;
    private $translator;
    private $router;

    public function __construct(TranslatorInterface $translator, ContainerInterface $container, RouterInterface $router)
    {
        $this->container = $container;
        $this->translator = $translator;
        $this->router = $router;
    }

    public function jsonResponse($response)
    {
        return new JsonResponse($response);
    }
    public function redirectToHome()
    {
        return new RedirectResponse($this->router->generate('AppBundle_homepage'));
    }

    public function try_catch_show_error($exception)
    {
        if ($this->container->get('kernel')->getEnvironment() == 'prod') {
            return $this->trans('genericos.consultas.ocurrio_un_error');
        } else {
            return $exception->getMessage();
        }
    }

    public function trans($id, array $parameters = array(), $domain = null, $locale = null)
    {
        return $this->translator->trans($id, $parameters, $domain, (($locale == null) ? $this->translator->getLocale() : $locale));
    }
    ///@brief Ejecuta el query ingresado
    ///@param $sql Query a ejecutar
    ///@param $params Array de parametros
    public function qryExec($sql, $params = array())
    {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
    }

    private function ajaxReturn($tipo, $mensaje = '', $titulo = '', $stop, $type = 'toast')
    {
        //$request = Request::createFromGlobals();
        //if ($request->isXmlHttpRequest()) {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
            $response = new Response();
            $response->setStatusCode(($stop) ? 404 : 200);
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent(json_encode(array(
                'WebScript' => $type,
                'texto' => $mensaje,
                'titulo' => $titulo,
                'icono' => $tipo
            )));
            return $response;
        } else {
            throw $this->createNotFoundException($mensaje);
        }
    }

    public function toastSuccess($mensaje, $titulo = '')
    {
        return $this->ajaxReturn('success', $mensaje, $titulo, false, 'toast');
    }

    public function toastInfo($mensaje, $titulo = '')
    {
        return $this->ajaxReturn('info', $mensaje, $titulo, false, 'toast');
    }

    public function toastDanger($mensaje, $titulo = '')
    {
        return $this->ajaxReturn('error', $mensaje, $titulo, false, 'toast');
    }

    public function toastWarning($mensaje, $titulo = '')
    {
        return $this->ajaxReturn('warning', $mensaje, $titulo, false, 'toast');
    }

    public function toastErrorSuccess($mensaje, $titulo = '')
    {
        return $this->ajaxReturn('success', $mensaje, $titulo, true, 'toast');
    }

    public function toastErrorInfo($mensaje, $titulo = '')
    {
        return $this->ajaxReturn('info', $mensaje, $titulo, true, 'toast');
    }

    public function toastErrorDanger($mensaje, $titulo = '')
    {
        return $this->ajaxReturn('error', $mensaje, $titulo, true, 'toast');
    }

    public function toastErrorWarning($mensaje, $titulo = '')
    {
        return $this->ajaxReturn('warning', $mensaje, $titulo, true, 'toast');
    }
}
