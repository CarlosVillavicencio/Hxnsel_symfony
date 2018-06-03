<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;

class FosUserRepository extends EntityRepository
{
    public function listar()
    {
        $array = $this->getEntityManager()
            ->createQueryBuilder()
            ->select(array(
                'fu.id',
                'fu.username',
                'fu.usernameCanonical',
                'fu.email',
                'fu.emailCanonical',
                'fu.enabled',
                'fu.salt',
                'fu.password',
                'fu.lastLogin',
                'fu.roles',
                'fu.firstName',
                'fu.lastName',
                'fu.dni',
                'fu.dni',
                'fu.themeDashboard',
                'u.id ubigeo_id',
            ))
            ->from('AppBundle:FosUser', 'fu')
            ->leftJoin('fu.ubigeo','u')
            ->orderBy('fu.id')
            ->getQuery()
            ->getResult(2);
        return $array;
    }

    public function listarById($id)
    {
        $array = $this->getEntityManager()
            ->createQueryBuilder()
            ->select(array(
                'fu.id',
                'fu.username',
                'fu.usernameCanonical',
                'fu.email',
                'fu.emailCanonical',
                'fu.enabled',
                'fu.salt',
                'fu.password',
                'fu.lastLogin',
                'fu.roles',
                'fu.firstName',
                'fu.lastName',
                'fu.dni',
                'fu.themeDashboard',
                'u.id ubigeo_id',
            ))
            ->from('AppBundle:FosUser', 'fu')
            ->leftJoin('fu.ubigeo','u')
            ->where('fu.id = :id')
            ->setParameter('id', $id)
            ->getQuery()
            ->getResult(2);
        return $array[0];
    }
}