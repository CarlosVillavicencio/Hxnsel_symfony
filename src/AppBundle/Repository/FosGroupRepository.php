<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class FosGroupRepository extends EntityRepository
{
    public function listar()
    {
        $array = array();
        $array = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('e')
            ->from('AppBundle:FosGroup', 'e')
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
}