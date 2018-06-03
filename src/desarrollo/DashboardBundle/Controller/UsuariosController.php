<?php

namespace desarrollo\DashboardBundle\Controller;

use AppBundle\AppBundle;
use AppBundle\Entity\FosGroup;
use AppBundle\Entity\Ubigeo;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\FosUser;

class UsuariosController extends Controller
{
    public function indexAction(Request $request)
    {
        $data = $this->getDoctrine()->getRepository(FosUser::class)->listar();
        return $this->render(':Dashboard/Usuarios:index.html.twig', array(
            'listado' => $data
        ));
    }

    public function addAction(Request $request)
    {
        $grupos = $this->getDoctrine()->getRepository(FosGroup::class)->getGruposByUserId(0, false);
        $ubigeo = $this->getDoctrine()->getRepository(Ubigeo::class)->listar();
        return $this->render(':Dashboard/Usuarios:nuevo.html.twig', array(
            'ubigeo' => $ubigeo,
            'grupos' => $grupos
        ));
    }

    public function editAction(Request $request, $id)
    {
        $tools = $this->get('herramientas');
        $data = $this->getDoctrine()->getRepository(FosUser::class)->listarById($id);
        if (!is_array($data['roles'])) {
            $data['roles'] = unserialize($data['roles']);
        }
        $grupos = $this->getDoctrine()->getRepository(FosGroup::class)->getGruposByUserId($id, false);
        $ubigeo = $this->getDoctrine()->getRepository(Ubigeo::class)->listar();
        $ubigeo_ubivid = $this->getDoctrine()->getRepository(Ubigeo::class)->findOneBy(array('id' => $data['ubigeo_id']));
        return $this->render(':Dashboard/Usuarios:editar.html.twig', array(
            'id' => $id,
            'data' => $data,
            'ubigeo' => $ubigeo,
            'ubivid' => $ubigeo_ubivid->getUbivid(),
            'grupos' => $grupos
        ));
    }

    public function viewOneAction(Request $request, $id)
    {
        $tools = $this->get('herramientas');
        if (!$request->isXmlHttpRequest()) {
            return $tools->redirectToHome();
        }
        $data = $this->getDoctrine()->getRepository(FosUser::class)->listarById($id);
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
            $array = array(
                'status' => true,
                'msg' => $tools->trans('genericos.consultas.reg_creado')
            );
            $data = $request->request->all();
            $usuario = $em->getRepository(FosUser::class)->findOneBy(array('username' => $data['username']));
            if ($usuario) {
                $array['status'] = false;
                $array['msg'] = $tools->trans('genericos.consultas.usuario_ya_existe');
                return $tools->toastDanger($array['msg']);
            }
            $userManager = $this->get('fos_user.user_manager');
            $usuario = $userManager->createUser();
            $usuario->setUsername($data['username']);
            $usuario->setUsernameCanonical($data['username']);
            $usuario->setEmail($data['email']);
            $usuario->setEmailCanonical($data['email']);
            $usuario->setPlainPassword($data['password']);
            $userManager->updateUser($usuario);
            $id = $usuario->getId();
            $usuario = $em->getRepository(FosUser::class)->find($id);
            $grupos = $this->getDoctrine()->getRepository(FosGroup::class)->getGruposByUserId($id, true);
            $grupos_temp = array();
            foreach ($grupos as $k => $v) {
                $grupos_temp[] = $v['group_id'];
            }
            $user_group = $request->request->get('user_group');
            $grupos_eliminar = array_diff($grupos_temp, $user_group);
            $grupos_insertar = array_diff($user_group, $grupos_temp);
            foreach ($grupos_eliminar as $k => $v) {
                $group = $this->getDoctrine()->getRepository(FosGroup::class)->find(intval($v));
                $usuario->removeGroup($group);
            }
            foreach ($grupos_insertar as $k => $v) {
                $group = $this->getDoctrine()->getRepository(FosGroup::class)->find(intval($v));
                $usuario->addGroup($group);
            }
            $usuario->setDni($data['dni']);
            $ubigeo = $em->getRepository(Ubigeo::class)->find($data['ubigeo_id']);
            $usuario->setUbigeo($ubigeo);
            $usuario->setThemeDashboard($data['themeDashboard']);
            $usuario->setFirstName($data['firstName']);
            $usuario->setLastName($data['lastName']);
            $usuario->setEnabled($request->request->get('enabled', false));
            $em->flush();
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
            $array = array(
                'status' => true,
                'msg' => $tools->trans('genericos.consultas.reg_modificado')
            );
            $userManager = $this->get('fos_user.user_manager');
            $usuario = $userManager->findUserBy(array('id' => $id));
            if (!$usuario) {
                $array['status'] = false;
                $array['msg'] = $tools->trans('genericos.consultas.no_se_encontro');
                return $tools->toastDanger($array['msg']);
            }
            $data = $request->request->all();
            $usuario_check = $em->getRepository(FosUser::class)->findOneBy(array('username' => $data['username']));
            if ($usuario_check) {
                if ($usuario_check->getId() != $id) {
                    $array['status'] = false;
                    $array['msg'] = $tools->trans('genericos.consultas.usuario_ya_existe');
                    return $tools->toastDanger($array['msg']);
                }
            }
            $usuario->setDni($data['dni']);
            $ubigeo = $em->getRepository(Ubigeo::class)->find($data['ubigeo_id']);
            $usuario->setUbigeo($ubigeo);
            $usuario->setUsername($data['username']);
            $usuario->setUsernameCanonical($data['username']);
            $usuario->setEmail($data['email']);
            $usuario->setEmailCanonical($data['email']);
            if ($request->request->get('password', '') != '') {
                $usuario->setPlainPassword($data['password']);
            }
            $userManager->updateUser($usuario);
            $usuario = $em->getRepository(FosUser::class)->find($id);
            $grupos = $this->getDoctrine()->getRepository(FosGroup::class)->getGruposByUserId($id, true);
            $grupos_temp = array();
            foreach ($grupos as $k => $v) {
                $grupos_temp[] = $v['group_id'];
            }
            $user_group = $request->request->get('user_group');
            $grupos_eliminar = array_diff($grupos_temp, $user_group);
            $grupos_insertar = array_diff($user_group, $grupos_temp);
            foreach ($grupos_eliminar as $k => $v) {
                $group = $this->getDoctrine()->getRepository(FosGroup::class)->find(intval($v));
                $usuario->removeGroup($group);
            }
            foreach ($grupos_insertar as $k => $v) {
                $group = $this->getDoctrine()->getRepository(FosGroup::class)->find(intval($v));
                $usuario->addGroup($group);
            }
            $usuario->setThemeDashboard($data['themeDashboard']);
            $usuario->setFirstName($data['firstName']);
            $usuario->setLastName($data['lastName']);
            $usuario->setEnabled($request->request->get('enabled', false));
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
            $usuario = $em->getRepository(FosUser::class)->find($id);
            $array = array(
                'id' => $id,
                'status' => true,
                'msg' => $tools->trans('genericos.consultas.reg_eliminado')
            );
            if (!$usuario) {
                $array['status'] = false;
                $array['msg'] = $tools->trans('genericos.consultas.no_se_encontro');
                return $tools->toastDanger($array['msg']);
            }
            $em->remove($usuario);
            $em->flush();
            return $tools->jsonResponse($array);
        } catch (\Exception $exc) {
            return $tools->toastDanger($tools->try_catch_show_error($exc));
        }
    }
}