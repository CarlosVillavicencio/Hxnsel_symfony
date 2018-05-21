<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;

class FosGroupRepository extends EntityRepository
{
    public function listar()
    {
        $array = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('fg')
            ->from('AppBundle:FosGroup', 'fg')
//            ->leftJoin('ServicesEntitiesBundle:TotPublicationHasTotPublicationServices', 'b',
//                'WITH', 'b.totPublication = a.totPublication')
//            ->leftJoin('a.totSubCategory', 'c')
//            ->leftJoin('c.totCategory', 'd')
//            ->leftJoin('a.totPublication', 'e')
//            ->leftJoin('b.totPublicationServices', 'f')
////            ->leftJoin('e.totSites', 'g')//Sites
//            ->leftJoin('e.totUbigeo', 'h')//Sites
//            ->leftJoin('h.totCountry', 'country')//Sites
//            ->where('e.id = 1');

//        $array = $array->groupBy('e.id')
            ->getQuery()
//            ->getResult();
            ->getResult(2);
        return $array;
    }

    public function listarById($id)
    {
        $array = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('fg')
            ->from('AppBundle:FosGroup', 'fg')
            ->where('fg.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult(2);
        return $array[0];
    }

    public function getGruposByUserId($user_id, $solo_este_usuario = false)
    {
        $qry = "SELECT
            fg.id group_id,
            fg.name,
            fuug.user_id
            FROM fos_group fg
            LEFT JOIN fos_user_user_group fuug
            ON fuug.group_id = fg.id
            AND fuug.user_id = %d";
        if ($solo_este_usuario) {
            $qry .= "
            WHERE fuug.user_id = %d
            GROUP BY fg.id
            ORDER BY fg.id";
            $sql = sprintf($qry, $user_id, $user_id);
        } else {
            $qry .= "
            GROUP BY fg.id
            ORDER BY fg.id";
            $sql = sprintf($qry, $user_id);
        }
        $em = $this->getEntityManager();
        $db = $em->getConnection();
        $stmt = $db->prepare($sql);
        $stmt->execute(array());
        $array = $stmt->fetchAll();
        return $array;
    }
}