<?php
// src/OC/PlatformBundle/Controller/AdvertController.php

namespace AppBundle\Controller;

use OC\PlatformBundle\Entity\Advert;
use OC\PlatformBundle\Entity\Application;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
Use AppBundle\Entity\Structure;
Use AppBundle\Entity\Projet;
use Doctrine\ORM\EntityRepository;
use AppBundle\Repository\ProjetRepository;
use AppBundle\Entity\SousDomaine;
use AppBundle\Form\ProjetRechercheType;
use AppBundle\Form\HebergementRechercheType;
use AppBundle\Form\DomaineRechercheType;
use AppBundle\Form\SousDomaineRechercheType;
use Doctrine\Common\Collections\ArrayCollection;



class ProjetController extends Controller
{

  /**
  *@Route("/projet", name="projet")
  */
  public function projetAction(Request $request){


    $Projet = $this->getDoctrine()
    ->getRepository('AppBundle:Projet')   // appel du repository
    ->getAll();                           // Utilisation de la méthode getAll pour récupérer toutes les données du projet


  #  foreach ($Projet->getSousDomaines() as $sousdomaine) {     Essai relation inverse
  #    var_dump($sousdomaine->getNomSousDomaine());
  #  }



    return $this->render("Projet.html.twig", array(     //Puis le résultat est envoyé au template pour l'affichage
      'Projet' => $Projet,
    ));


  }

  /**
  *@Route("/rechercheprojet", name="rechercheprojet")
  */
  public function rechercheprojetAction(Request $request){

    $form = $this->createForm(ProjetRechercheType::class);  // Création du formulaire

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

      $nomProjet = $form['nomProjet']->getData();   //on récupère le nom du projet

      $Projet = $this->getDoctrine()
      ->getRepository('AppBundle:Projet') //On utilise le Repository de Projet
      ->findone($nomProjet); // J'utilise la méthode du repository

      return $this->render("Projet.html.twig", array(
        'Projet' => $Projet,                  // Le résultat est envoyé au template pour l'affichage
      ));
    }

    return $this->render('RechercheProjet.html.twig', array('form' => $form->createView()));
  }

  /**
  *@Route("/hebergement", name="hebergement")
  */
  public function hebergementAction(Request $request){

    $Hebergement = $this->getDoctrine()
    ->getRepository('AppBundle:Hebergement') // On utilise le repository d'Hebergement
    ->getAll();                             // On récupère toutes les données de l'hébergement

    return $this->render("Hebergement.html.twig", array(
      'Hebergement' => $Hebergement,        //Les données sont envoyées au template pour l'affichage
    ));
  }

  /**
  *@Route("/sousdomaine", name="sousdomaine")
  */
  public function sousdomaineAction(Request $request){

    $SousDomaine = $this->getDoctrine()
    ->getRepository('AppBundle:SousDomaine') // On utilise le Repository de sousdomaine
    ->getAll();                              // On récupère toutes les données concernant les sous domaines

    return $this->render("SousDomaine.html.twig", array(
      'SousDomaine' => $SousDomaine,          // Les données sont envoyées au template pour l'affichage
    ));

  }

  /**
  *@Route("/domaine", name="domaine")
  */
  public function domaineAction(Request $request){
      $Domaine = $this->getDoctrine()
      ->getRepository('AppBundle:Domaine') // On utilise le repository de domaine
      ->getAll(); // On utilise la méthode pour avoir les donées des domaines

      return $this->render("Domaine.html.twig", array(
        'Domaine' => $Domaine,      // Les données sont envoyées au template pour l'affichage
      ));

  }

  /**
  *@Route("/recherchehebergement", name="recherchehebergement")
  */
  public function recherchehebergementAction(Request $request){

    $form = $this->createForm(HebergementRechercheType::class); //Création du formulaire

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

      $URL = $form['URL']->getData();     //Récupération de l'URL

      $Hebergement = $this->getDoctrine()
      ->getRepository('AppBundle:Hebergement') //On Utilise le repository de l'hebergement
      ->findone($URL);          // On lance la requète

      return $this->render("Hebergement.html.twig", array(
        'Hebergement' => $Hebergement,      //On envoie les données pour l'affichage
      ));
    }

    return $this->render('RechercheHebergement.html.twig', array('form' => $form->createView()));
  }

  /**
  *@Route("/recherchedomaine", name="recherchedomaine")
  */
  public function recherchedomaineAction(Request $request){

    $form = $this->createForm(DomaineRechercheType::class); // Création du formulaire

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

      $nomDomaine = $form['nomDomaine']->getData(); // On récupère le nom de domaine

      $Domaine = $this->getDoctrine()
      ->getRepository('AppBundle:Domaine') //Recupérer la variable du form pour faire la requete dans le repository
      ->findone($nomDomaine);             //On utilise la éthode pour lancer la recherche

      return $this->render("Domaine.html.twig", array(
        'Domaine' => $Domaine,            //Affichage des données
      ));
    }

    return $this->render('RechercheDomaine.html.twig', array('form' => $form->createView()));
  }

  /**
  *@Route("/recherchesousdomaine", name="recherchesousdomaine")
  */
  public function recherchesousdomaineAction(Request $request){

    $form = $this->createForm(SousDomaineRechercheType::class); //Création du formulaire

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

      $nomSousDomaine = $form['code']->getData(); // On récupère le nom de sous domaine

      $SousDomaine = $this->getDoctrine()
      ->getRepository('AppBundle:SousDomaine') //On utilise le repository de SousDomaine
      ->findone($nomSousDomaine); //On lance la recherche

      return $this->render("SousDomaine.html.twig", array(
        'SousDomaine' => $SousDomaine, //Affichage
      ));
    }

    return $this->render('RechercheSousDomaine.html.twig', array('form' => $form->createView()));
  }

}
