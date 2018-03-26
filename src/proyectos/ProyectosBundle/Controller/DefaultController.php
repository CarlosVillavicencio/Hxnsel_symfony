<?php

namespace proyectos\ProyectosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use proyectos\ProyectosBundle\Model\Common;

///@brief Clase que contiene las rutas que pertenecen a ProyectosBundle
class DefaultController extends Common {

    ///@brief Ruta home
    /**
     * @Route("/home",name="_proyectos_default")
     */
    public function indexAction() {
//        $ROLES = $this->getUser()->getRoless();
//        $ROLES = $this->rolesA();
//        foreach ($ROLES as $k => $v) {
//            echo '<pre>';
//            print_r($ROLES[$k]);
//            echo '</pre>';
//            if ($ROLES[$k] !== 0) {
//                unset($ROLES[0]);
//            }
//        }
//        echo $this->user();
//        echo '<pre>';
//        print_r($ROLES);
//        echo '</pre>';
////        echo $this->getUser()->getUsername();
//        exit();
//        $sql = "SELECT *
//            FROM roles
//            WHERE estado = ?";
//        $results = $this->qryOne($sql, array('A'));
//        echo '<pre>';
//        print_r($results);
//        echo '</pre>';
//        echo '<pre>';
//        print_r($this->getRoles('proyectos'));
//        echo '</pre>';
//        echo $this->grupoid();
//        exit();
        $sql = "INSERT INTO user (id,username,password,roles,estado)
            VALUES (NULL, ?, ?, ?, ?)";
//        $this->qryExec($sql,array('test_netbeans11','dfdfdf','','1'));
        $sql = "SELECT * FROM user";
//        $LISTADO = $this->qry($sql);
//        echo '<pre>';
//        print_r($LISTADO);
//        echo '</pre>';
//        exit();
        $twig['usuario'] = $this->user();
//        $twig['LISTADO'] = $LISTADO;
        return $this->render('ProyectosBundle:Default:index.html.twig', $twig);
    }

}
