<?php
// src/OC/PlatformBundle/DataFixtures/ORM/LoadCategory.php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use AppBundle\Entity\TypeProjet;

class LoadTypeProjet implements FixtureInterface
{
  // Dans l'argument de la méthode load, l'objet $manager est l'EntityManager
  public function load(ObjectManager $manager)
  {
    $code = 1234;
    $version = 1;
    // Liste des noms de catégorie à ajouter
    $nomTypeProjet = array(
      'Wordpress',
      'Drupal',
      'Symfony',
    );
    foreach ($nomTypeProjet as $nomTypeProjet) {

      // On crée la catégorie
      $TypeProjet = new TypeProjet();
      $TypeProjet->setNomTypeProjet($nomTypeProjet);
      $TypeProjet->setVersion($version = $version + 1);
      $TypeProjet->setCode($code = $code + 1);
      // On la persiste
      $manager->persist($TypeProjet);
    }
    // On déclenche l'enregistrement de toutes les catégories
    $manager->flush();
  }
}
