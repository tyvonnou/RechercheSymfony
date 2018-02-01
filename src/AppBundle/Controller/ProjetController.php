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


class ProjetController extends Controller
{

  /**
  *@Route("/projet", name="projet")
  */
  public function projetAction(Request $request)
  {
    $Projet = $this->getDoctrine()
    ->getRepository('AppBundle:Projet')
    ->getAll();

    return $this->render("Projet.html.twig", array(
      'Projet' => $Projet,
    ));
  }

  /**
  *
  *@Route("/rechercheprojet", name="rechercheprojet")
  */
  public function indexAction(Request $request)
  {

    $form = $this->createForm(ProjetRechercheType::class);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

      $nomProjet = $form['nomProjet']->getData();

      $Projet = $this->getDoctrine()
      ->getRepository('AppBundle:Projet') //Recupérer la variable du form pour faire la requete dans le repository
      ->findone($nomProjet);

      return $this->render("Projet.html.twig", array(
        'Projet' => $Projet,
      ));
    }

    return $this->render('RechercheProjet.html.twig', array('form' => $form->createView()));
  }

  /**
  *@Route("/hebergement", name="hebergement")
  */
  public function hebergementAction(Request $request)
  {
    $Hebergement = $this->getDoctrine()
    ->getRepository('AppBundle:Hebergement')
    ->getAll();
    return $this->render("Hebergement.html.twig", array(
      'Hebergement' => $Hebergement,
    ));
  }


  /**
  *@Route("/sousdomaine", name="sousdomaine")
  */
  public function sousdomaineAction(Request $request)
  {
    $SousDomaine = $this->getDoctrine()
    ->getRepository('AppBundle:SousDomaine')
    ->getAll();

    return $this->render("SousDomaine.html.twig", array(
      'SousDomaine' => $SousDomaine,
    ));

  }
    /**
    *@Route("/domaine", name="domaine")
    */
    public function domaineAction(Request $request)
    {
      $Domaine = $this->getDoctrine()
      ->getRepository('AppBundle:Domaine')
      ->getAll();

      return $this->render("Domaine.html.twig", array(
        'Domaine' => $Domaine,
      ));

  }

  /**
  *
  *@Route("/recherchehebergement", name="recherchehebergement")
  */
  public function recherchehebergementAction(Request $request)
  {

    $form = $this->createForm(HebergementRechercheType::class);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

      $URL = $form['URL']->getData();

      $Hebergement = $this->getDoctrine()
      ->getRepository('AppBundle:Hebergement') //Recupérer la variable du form pour faire la requete dans le repository
      ->findone($URL);

      return $this->render("Hebergement.html.twig", array(
        'Hebergement' => $Hebergement,
      ));
    }

    return $this->render('RechercheHebergement.html.twig', array('form' => $form->createView()));
  }

  /**
  *
  *@Route("/recherchedomaine", name="recherchedomaine")
  */
  public function recherchedomaineAction(Request $request)
  {

    $form = $this->createForm(DomaineRechercheType::class);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

      $nomDomaine = $form['nomDomaine']->getData();

      $Domaine = $this->getDoctrine()
      ->getRepository('AppBundle:Domaine') //Recupérer la variable du form pour faire la requete dans le repository
      ->findone($nomDomaine);

      return $this->render("Domaine.html.twig", array(
        'Domaine' => $Domaine,
      ));
    }

    return $this->render('RechercheDomaine.html.twig', array('form' => $form->createView()));
  }


  /**
  *
  *@Route("/recherchesousdomaine", name="recherchesousdomaine")
  */
  public function recherchesousdomaineAction(Request $request)
  {

    $form = $this->createForm(SousDomaineRechercheType::class);

    if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

      $nomSousDomaine = $form['code']->getData();

      $SousDomaine = $this->getDoctrine()
      ->getRepository('AppBundle:SousDomaine') //Recupérer la variable du form pour faire la requete dans le repository
      ->findone($nomSousDomaine);

      return $this->render("SousDomaine.html.twig", array(
        'SousDomaine' => $SousDomaine,
      ));
    }

    return $this->render('RechercheSousDomaine.html.twig', array('form' => $form->createView()));
  }

}
