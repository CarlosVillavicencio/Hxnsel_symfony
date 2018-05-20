<?php

namespace desarrollo\DashboardBundle\Controller;

use AppBundle\AppBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity\FosUser;

class UsuariosController extends Controller
{
    public function indexAction(Request $request)
    {
        $data = $this->getDoctrine()->getRepository(FosUser::class)->listar();
//        dump($data);
//        exit();
        return $this->render(':Dashboard/Usuarios:index.html.twig', array(
            'listado' => $data
        ));
    }

    public function addAction(Request $request)
    {
        return $this->render(':Dashboard/Usuarios:nuevo.html.twig');
    }

    public function editAction(Request $request, $id)
    {
        $tools = $this->get('herramientas');
        $data = $this->getDoctrine()->getRepository(FosUser::class)->listarById($id);
        if (!is_array($data['roles'])) {
            $data['roles'] = unserialize($data['roles']);
        }
        $grupos = $this->getDoctrine()->getRepository(FosUser::class)->obtenerGruposYUsuarios();
        return $this->render(':Dashboard/Usuarios:editar.html.twig', array(
            'id' => $id,
            'data' => $data,
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
            $grupo = new FosUser();
            $name = $request->request->get('name');
            $roles = strtoupper($request->request->get('roles'));
            $roles = explode(',', $roles);
            $roles = serialize($roles);
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
//        canonical de fosuserbundle se consigue de la siguiente forma
//        dump(mb_convert_case($request->request->get('email'), MB_CASE_LOWER, "UTF-8"));
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
            dump($data);
            exit();
//            user_group
            $usuario->setUsername($data['username']);
            $usuario->setUsernameCanonical($data['username']);
            $usuario->setEmail($data['email']);
            $usuario->setEmailCanonical($data['email']);
            if ($request->request->get('password', '') != '') {
                $usuario->setPlainPassword($data['password']);
            }
            $userManager->updateUser($usuario);
            $usuario = $em->getRepository(FosUser::class)->find($id);
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
            $grupo = $em->getRepository(FosUser::class)->find($id);
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