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

    public function obtenerGruposYUsuarios($user_id = null)
    {
        if ($user_id != null) {
            $array = $this->getEntityManager()
                ->createQueryBuilder()
                ->select(
                    'fg.id group_id',
                    'fg.name',
                    'fu.id user_id'
                )
                ->from('AppBundle:FosGroup', 'fg')
                ->join('fg.user', 'fu', 'WITH', 'fu.id = :user_id')
                ->setParameter('user_id', $user_id)
                ->orderBy('fg.id')
                ->getQuery()
                ->getResult(2);
        } else {
            $array = $this->getEntityManager()
                ->createQueryBuilder()
                ->select(
                    'fg.id group_id',
                    'fg.name',
                    'fu.id user_id'
                )
                ->from('AppBundle:FosGroup', 'fg')
                ->leftJoin('fg.user', 'fu')
                ->orderBy('fg.id')
                ->getQuery()
                ->getResult(2);
        }
        return $array;
    }
}