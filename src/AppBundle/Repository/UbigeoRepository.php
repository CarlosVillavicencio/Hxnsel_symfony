<?php

namespace AppBundle\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr;

class UbigeoRepository extends EntityRepository
{
    public function listar($provin_p_distri_d = null, $codigo_ubivid = null)
    {
        $ubivid = '';
        $ocultar_nombre_provincia = '1';
        switch ($provin_p_distri_d) {
            case 'P':
                $ubivid .= substr($codigo_ubivid, 0, 2) . '__00%';
                $ocultar_nombre_provincia = substr($codigo_ubivid, 0, 2) . '0000';
                break;
            case 'D':
                $ubivid .= substr($codigo_ubivid, 0, 4) . '%';
                $ocultar_nombre_provincia = substr($codigo_ubivid, 0, 4) . '00';
                break;
            default:
                $ubivid .= '%0000';
                break;
        }
        if ($codigo_ubivid == null) {
            $ubivid = '%0000';
        }
        $array = $this->getEntityManager()
            ->createQueryBuilder()
            ->select('u')
            ->from('AppBundle:Ubigeo', 'u')
            ->where('u.ubivid LIKE :ubivid')
            ->andWhere('u.ubivid <> :ocultar_nombre_provincia')
            ->setParameter('ubivid', $ubivid)
            ->setParameter('ocultar_nombre_provincia', $ocultar_nombre_provincia)
            ->getQuery()
            ->getResult(2);
        return $array;
    }
}