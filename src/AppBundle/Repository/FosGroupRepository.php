<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

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
        return $array;
    }
}