<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class FosUserRepository extends EntityRepository
{
    public function listar()
    {
        $array = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('fu')
            ->from('AppBundle:FosUser', 'fu')
            ->getQuery()
            ->getResult(2);
        return $array;
    }

    public function listarById($id)
    {
        $array = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('fu')
            ->from('AppBundle:FosUser', 'fu')
            ->where('fu.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult(2);
        return $array[0];
    }
}