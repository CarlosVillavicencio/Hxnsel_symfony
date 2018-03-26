<?php

namespace proyectos\ProyectosBundle\Model;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Doctrine\DBAL\DriverManager;

///@brief Clase Common contiene todas las funciones que podrán ser usadas por los Bundles que extiendan de esta
class Common extends Controller {

//    public function getRoles() {
//        $em = $this->getDoctrine()->getEntityManager();
//        $db = $em->getConnection();
//        $query = "SELECT R.nombre
//            FROM sys_hxnsel.roles_group RG
//            LEFT JOIN sys_hxnsel.roles R ON R.id = RG.id_roles
//            WHERE RG.id_user_group = ?
//            AND R.estado = 'A'";
//        $stmt = $db->prepare($query);
//        $params = array($this->grupoid());
//        $stmt->execute($params);
//        $results = $stmt->fetchAll();
//        return $results;
//    }
//    public function getRoles($ROL) {
//        $sql = "SELECT R.nombre
//            FROM sys_hxnsel.roles_group RG
//            LEFT JOIN sys_hxnsel.roles R ON R.id = RG.id_roles
//            WHERE RG.id_user_group = ?
//            AND R.estado = 'A'
//            AND R.nombre = ?";
//        $results = $this->qry($sql, array($this->grupoid(), $ROL));
//        return $results;
//    }
    ///@return Retorna todos los resultados de la consulta
    public function qry($sql, $params = array()) {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
        $results = $stmt->fetchAll();
        return $results;
    }

    ///@return Retorna un solo resultado de la consulta
    public function qryOne($sql, $params = array()) {
        $conn = $this->get('doctrine.dbal.default_connection');
        $statement = $conn->prepare($sql);
        $statement->execute($params);
        $result = $statement->fetch();
        return $result;
    }

    ///@brief Ejecuta el query ingresado
    ///@param $sql Query a ejecutar
    ///@param $params Array de parametros
    public function qryExec($sql, $params = array()) {
        $em = $this->getDoctrine()->getManager();
        $db = $em->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute($params);
    }

    ///@brief Agrega registros en la Base de Datos
    ///@param $entity Entidad a usar para el insert
    public function insert_flush($entity) {
        $em = $this->getDoctrine()->getManager();
        $em->persist($entity);
        $em->flush();
    }

    ///@brief Entrega un array con todos los registros
    ///@param $entity Entidad a usar para el listado
    public function findAll_array($entity, $condicion = true) {
//        $repository = $this->getDoctrine()->getRepository($entity);
        $repository = $this->repository($entity);
        if ($condicion) {
            $array = $repository->createQueryBuilder('e')
                    ->select('e')
                    ->getQuery()
                    ->getResult(\Doctrine\ORM\Query::HYDRATE_ARRAY);
        } else {
            $array = $repository->findAll();
        }
        return $array;
    }

    ///@brief Entrega la variable $repository para las acciones(update,delete,insert,select)
    public function repository($entity) {
        $repository = $this->getDoctrine()->getRepository($entity);
        return $repository;
    }

    ///@return Retorna una cadena con el ambiente de desarrollo dev-prod
    public function ambiente() {
        return $this->container->get('kernel')->getEnvironment();
    }

    ///@return Returna el servidor en el que se encuentra intranet-extranet
    public function server() {

        return $serv = $this->container->getParameter("server"); //  intranet / extranet
    }

    ///@brief Convierte un array en una respuesta de tipo 'application/json'
    ///@param $array Array a convertir
    ///@return Respuesta con formato json
    public function jsonReturn($array) {
        $data = json_encode($array);
        $response = new Response();
        $response->setContent($data);
        $response->headers->set('Content-Type', 'application/json');
        return $response;
    }

    ///@return Retorna el usuario logueado
    public function user() {
        $user = '';
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = trim($this->getUser()->getUsername());
        }
        return $user;
    }

    ///@return Retorna los roles del usuario logueado cuyo estado sea ativo-innactivo-nulo
    public function rolesALL() {
        $roles = array();
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            //$roles = implode('-', $this->getUser()->getRoles());
            $roles = $this->getUser()->getRoless();
            foreach ($roles as $k => $v) {
                if ($roles[$k]['rolcestado'] !== '1' && $roles[$k]['rolcestado'] !== '0' && $roles[$k]['rolcestado'] !== '') {
                    unset($roles[$k]);
                }
            }
        }
        return $roles;
    }

    ///@return Retorna los roles del usuario logueado cuyo estado sea ativo 
    public function rolesA() {
        $roles = array();
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $roles = $this->getUser()->getRoless();
            foreach ($roles as $k => $v) {
                if ($roles[$k]['rolcestado'] !== '1') {
                    unset($roles[$k]);
                }
            }
        }
        return $roles;
    }

    ///@return Retorna los roles del usuario logueado cuyo estado sea inactivo-nulo
    public function rolesI() {
        $roles = array();
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY')) {
            $roles = $this->getUser()->getRoless();
            foreach ($roles as $k => $v) {
                if ($roles[$k]['rolcestado'] !== '0' && $roles[$k]['rolcestado'] !== '') {
                    unset($roles[$k]);
                }
            }
        }
        return $roles;
    }

    ///@brief Cuando la peticion viene de un Ajax.
    ///Genera una pagina del tipo 404 para reportar errores que son mostrados 
    ///como ventanas de alerta.
    ///En caso contrario.
    ///Genera una Excepcion
    ///
    ///Los formularios deben tener previamente implementado 
    ///una funcion que les permita procesar la respuesta de este metodo.
    ///
    ///@param $mensaje cadena a mostrar
    ///@param $titulo titulo a mostrar
    ///@return Retorna el Response con el status 404
    public function ajaxError($mensaje, $titulo = '') {
        $request = Request::createFromGlobals();
        if ($request->isXmlHttpRequest()) {
            $response = new Response();
            $response->setStatusCode(404);
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent(json_encode(array(
                'WebScript' => 'sms',
                'texto' => $mensaje,
                'titulo' => $titulo,
                'icono' => 'danger'
            )));
            return $response;
        } else {
            throw $this->createNotFoundException($mensaje);
        }
    }

    ///@return Retorna un mensaje simple
    public function ajaxSms($mensaje, $titulo = '') {
        return $this->ajaxReturn('', $mensaje, $titulo, false);
    }

    ///@return Retorna un mensaje tipo success
    public function ajaxSmsSuccess($mensaje, $titulo = '') {
        return $this->ajaxReturn('success', $mensaje, $titulo, false);
    }

    ///@return Retorna un mensaje tipo danger
    public function ajaxSmsDanger($mensaje, $titulo = '') {
        return $this->ajaxReturn('danger', $mensaje, $titulo, false);
    }

    ///@return Retorna un mensaje tipo warning
    public function ajaxSmsWarning($mensaje, $titulo = '') {
        return $this->ajaxReturn('warning', $mensaje, $titulo, false);
    }

    ///@return Retorna un mensaje de error
    public function ajaxSmsError($mensaje, $titulo = '') {
        return $this->ajaxReturn('', $mensaje, $titulo, true);
    }

    ///@return Retorna un mensaje de error tipo success
    public function ajaxSmsErrorSuccess($mensaje, $titulo = '') {
        return $this->ajaxReturn('success', $mensaje, $titulo, true);
    }

    ///@return Retorna un mensaje de error tipo danger
    public function ajaxSmsErrorDanger($mensaje, $titulo = '') {
        return $this->ajaxReturn('danger', $mensaje, $titulo, true);
    }

    ///@return Retorna un mensaje de error tipo warning
    public function ajaxSmsErrorWarning($mensaje, $titulo = '') {
        return $this->ajaxReturn('warning', $mensaje, $titulo, true);
    }

    ///@brief Cuando la peticion viene de un Ajax.
    ///Genera una pagina del tipo 404 o 200 para reportar errores o mensajes que son mostrados 
    ///como ventanas de alerta.
    ///
    ///Los formularios deben tener previamente implementado 
    ///una funcion que les permita procesar la respuesta de este metodo.
    ///
    ///@param $tipo Tipo del mensaje a mostrar(success, info, warning, error)
    ///@param $mensaje Cadena a mostrar
    ///@param $titulo Titulo a mostrar
    ///@param $stop true o false
    ///@param $sms Tipo de mensaje(toast, alert)
    ///@return Retorna el Response con el status 404 o 200
    private function ajaxReturn($tipo, $mensaje = '', $titulo = '', $stop, $sms = 'sms') {
        //$request = Request::createFromGlobals();
        //if ($request->isXmlHttpRequest()) {
        if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
            $response = new Response();
            $response->setStatusCode(($stop) ? 404 : 200);
            $response->headers->set('Content-Type', 'application/json');
            $response->setContent(json_encode(array(
                'WebScript' => $sms,
                'texto' => $mensaje,
                'titulo' => $titulo,
                'icono' => $tipo
            )));
            return $response;
        } else {
            throw $this->createNotFoundException($mensaje);
        }
    }

    ///@return Retorna un mensaje tipo toast success
    public function toastSuccess($mensaje, $titulo = '') {
        return $this->ajaxReturn('success', $mensaje, $titulo, false, 'toast');
    }

    ///@return Retorna un mensaje tipo toast info
    public function toastInfo($mensaje, $titulo = '') {
        return $this->ajaxReturn('info', $mensaje, $titulo, false, 'toast');
    }

    ///@return Retorna un mensaje tipo toast danger
    public function toastDanger($mensaje, $titulo = '') {
        return $this->ajaxReturn('error', $mensaje, $titulo, false, 'toast');
    }

    ///@return Retorna un mensaje tipo toast warning
    public function toastWarning($mensaje, $titulo = '') {
        return $this->ajaxReturn('warning', $mensaje, $titulo, false, 'toast');
    }

    ///@return Retorna un mensaje de error tipo toast success
    public function toastErrorSuccess($mensaje, $titulo = '') {
        return $this->ajaxReturn('success', $mensaje, $titulo, true, 'toast');
    }

    ///@return Retorna un mensaje de error tipo toast info
    public function toastErrorInfo($mensaje, $titulo = '') {
        return $this->ajaxReturn('info', $mensaje, $titulo, true, 'toast');
    }

    ///@return Retorna un mensaje de error tipo toast danger
    public function toastErrorDanger($mensaje, $titulo = '') {
        return $this->ajaxReturn('error', $mensaje, $titulo, true, 'toast');
    }

    ///@return Retorna un mensaje de error tipo toast warning
    public function toastErrorWarning($mensaje, $titulo = '') {
        return $this->ajaxReturn('warning', $mensaje, $titulo, true, 'toast');
    }

}
