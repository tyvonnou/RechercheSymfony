<?php

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
/**
 * SousDomaineRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SousDomaineRepository extends \Doctrine\ORM\EntityRepository
{

  public function getAll(){ //recherche générale
    $em = $this->getEntityManager();
    $qb = $em->createQueryBuilder();

    $qb->select(array('sd', 'd'))
    ->from('AppBundle\Entity\SousDomaine', 'sd')
    ->join('sd.domaine', 'd');


    $query = $qb->getQuery();
    $results = $query->getResult();

    return $results;

  }

  public function findone($nomDomaine) {//recherche par nom de domaine

    $em = $this->getEntityManager();
    $qb = $em->createQueryBuilder();

     $qb->select(array('s'))
     ->from('AppBundle\Entity\SousDomaine', 's')
     ->where('s.id = :id')
     ->setParameter('id', $nomDomaine);

    $query = $qb->getQuery();
    $results = $query->getResult();

    return $results;


  }
}
