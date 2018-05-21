<?php

namespace desarrollo\DashboardBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\FosGroup;

class GruposController extends Controller
{
    public function indexAction(Request $request)
    {
        $data = $this->getDoctrine()->getRepository(FosGroup::class)->listar();
        return $this->render(':Dashboard/Grupos:index.html.twig', array(
            'listado' => $data
        ));
    }

    public function addAction(Request $request)
    {
        $data = $this->getDoctrine()->getRepository(FosGroup::class)->listar();
        $roles = array();
        foreach ($data as $k => $v) {
            $roles_temp = array();
            if (is_array($v['roles'])) {
                $roles_temp = $v['roles'];
            } else {
                $roles_temp = unserialize($v['roles']);
            }
            $roles = array_unique(array_merge($roles, $roles_temp));
        }
        $roles = implode(',', $roles);
        return $this->render(':Dashboard/Grupos:nuevo.html.twig', array(
            'roles' => $roles
        ));
    }

    public function editAction(Request $request, $id)
    {
        $tools = $this->get('herramientas');
        $data = $this->getDoctrine()->getRepository(FosGroup::class)->listar();
        $roles = array();
        foreach ($data as $k => $v) {
            $roles_temp = array();
            if (is_array($v['roles'])) {
                $roles_temp = $v['roles'];
            } else {
                $roles_temp = unserialize($v['roles']);
            }
            $roles = array_unique(array_merge($roles, $roles_temp));
        }
        $roles = implode(',', $roles);
        $data = $this->getDoctrine()->getRepository(FosGroup::class)->listarById($id);
        if (!is_array($data['roles'])) {
            $data['roles'] = unserialize($data['roles']);
        }
        return $this->render(':Dashboard/Grupos:editar.html.twig', array(
            'id' => $id,
            'roles' => $roles,
            'data' => $data
        ));
    }

    public function viewOneAction(Request $request, $id)
    {
        $tools = $this->get('herramientas');
        if (!$request->isXmlHttpRequest()) {
            return $tools->redirectToHome();
        }
        $data = $this->getDoctrine()->getRepository(FosGroup::class)->listarById($id);
        if (!is_array($data['roles'])) {
            $data['roles'] = unserialize($data['roles']);
        }
        $array = array(
            'id' => $id,
            'data' => $data
        );
        return $tools->jsonResponse($array);
    }

    public function newAction(Request $request)
    {
        $tools = $this->get('herramientas');
        if (!$request->isXmlHttpRequest()) {
            return $tools->redirectToHome();
        }
        try {
            $em = $this->getDoctrine()->getManager();
            $grupo = $em->getRepository(FosGroup::class)->findOneBy(array('name' => $request->request->get('name')));
            if ($grupo) {
                $array['status'] = false;
                $array['msg'] = $tools->trans('genericos.consultas.grupo_ya_existe');
                return $tools->toastDanger($array['msg']);
            }
            $grupo = new FosGroup();
            $name = $request->request->get('name');
            $roles = strtoupper($request->request->get('roles'));
            $roles = explode(',', $roles);
            $grupo->setName($name);
            $grupo->setRoles($roles);
            $em->persist($grupo);
            $em->flush();
            $array = array(
                'status' => true,
                'msg' => $tools->trans('genericos.consultas.reg_creado')
            );
            return $tools->jsonResponse($array);
        } catch (\Exception $exc) {
            return $tools->toastDanger($tools->try_catch_show_error($exc));
        }
    }

    public function updateAction(Request $request, $id)
    {
        $tools = $this->get('herramientas');
        if (!$request->isXmlHttpRequest()) {
            return $tools->redirectToHome();
        }
        try {
            $em = $this->getDoctrine()->getManager();
            $grupo = $em->getRepository(FosGroup::class)->find($id);
            $array = array(
                'status' => true,
                'msg' => $tools->trans('genericos.consultas.reg_modificado')
            );
            if (!$grupo) {
                $array['status'] = false;
                $array['msg'] = $tools->trans('genericos.consultas.no_se_encontro');
                return $tools->toastDanger($array['msg']);
            }
            $name = $request->request->get('name');
            $grupo_check = $em->getRepository(FosGroup::class)->findOneBy(array('name' => $name));
            if ($grupo_check) {
                if ($grupo_check->getId() != $id) {
                    $array['status'] = false;
                    $array['msg'] = $tools->trans('genericos.consultas.grupo_ya_existe');
                    return $tools->toastDanger($array['msg']);
                }
            }
            $roles = strtoupper($request->request->get('roles'));
            $roles = explode(',', $roles);
            $grupo->setName($name);
            $grupo->setRoles($roles);
            $em->flush();
            return $tools->jsonResponse($array);
        } catch (\Exception $exc) {
            return $tools->toastDanger($tools->try_catch_show_error($exc));
        }
    }

    public function deleteAction(Request $request, $id)
    {
        $tools = $this->get('herramientas');
        if (!$request->isXmlHttpRequest()) {
            return $tools->redirectToHome();
        }
        try {
            $em = $this->getDoctrine()->getManager();
            $grupo = $em->getRepository(FosGroup::class)->find($id);
            $array = array(
                'id' => $id,
                'status' => true,
                'msg' => $tools->trans('genericos.consultas.reg_eliminado')
            );
            if (!$grupo) {
                $array['status'] = false;
                $array['msg'] = $tools->trans('genericos.consultas.no_se_encontro');
                return $tools->toastDanger($array['msg']);
            }
            $em->remove($grupo);
            $em->flush();
            return $tools->jsonResponse($array);
        } catch (\Exception $exc) {
            return $tools->toastDanger($tools->try_catch_show_error($exc));
        }
    }
}