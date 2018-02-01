<?php

namespace AppBundle\Repository;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\QueryBuilder;
/**
 * ProjetRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class ProjetRepository extends \Doctrine\ORM\EntityRepository
{
  public function getAll()
  {
    $em = $this->getEntityManager();
    $qb = $em->createQueryBuilder();

     $qb->select(array('p', 't'))
     ->from('AppBundle\Entity\Projet', 'p')
     ->leftjoin('p.typeProjet', 't');


    $query = $qb->getQuery();
    $results = $query->getResult();

    return $results;

  }

  public function findAnnonceByParametres()

{

$query = $this->createQueryBuilder('p');

$query->where('a.nomProjet = :nomProjet')

->setParameters(array(

'NomProjet' => $data['nomProjet']));

// Si la recherche porte sur toutes les marques

if($data['nomProjet'] != '')

{

$query->andWhere('a.nomProjet = :nomProjet')

->setParameter('nomProjet', $data['nomProjet']);

}
return $query->getQuery()->getResult();

}

public function findone($nomProjet) {

  $em = $this->getEntityManager();
  $qb = $em->createQueryBuilder();

   $qb->select(array('p', 't'))
   ->from('AppBundle\Entity\Projet', 'p')
   ->leftjoin('p.typeProjet', 't')
   ->where('p.id = :id')
   ->setParameter('id', $nomProjet);

  $query = $qb->getQuery();
  $results = $query->getResult();
  
  return $results;


}
}
