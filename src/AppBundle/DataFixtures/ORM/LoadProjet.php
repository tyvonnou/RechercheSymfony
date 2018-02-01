<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\TypeProjet;

class LoadProjet implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  { $code =352;

    // Liste des noms de catégorie à ajouter
    $nomProjet = array(
      'Projet1',
      'Projet2',
      'Projet3',
    );
    foreach ($nomProjet as $nomProjet) {

      // On crée la catégorie
      $Projet = new Projet();
      $Projet->setNomProjet($nomProjet);
      $TypeProjet->setCode($code = $code + 1);

    
      // On la persiste
      $manager->persist($Projet);
    }
    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}
