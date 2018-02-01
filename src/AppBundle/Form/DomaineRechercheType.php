<?php
// src/HurricaneScript/AnnonceBundle/Form/AnnonceRechercheType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Range;
use AppBundle\Entity\Domaine;
class DomaineRechercheType extends AbstractType

{

public function buildForm(FormBuilderInterface $builder, array $options)
{

  $builder
    ->add('nomDomaine', EntityType::class, array(
    'class'         => 'AppBundle:Domaine',
    'choice_label'  => 'nomDomaine',
    'multiple'      => false,
    'expanded'       => false,
    ))
    ->add('Rechercher',      SubmitType::class);


    }

public function getName()

{

return 'RechercheProjet';
}

}
