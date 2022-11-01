<?php

namespace App\Form;

use App\Entity\Formationn;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationnType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('dateDebut')
            ->add('dateFin')
            ->add('nombrePart')
            ->add('duree')
            ->add('etat')
            ->add('description')
            ->add('session', EntityType::class, array('class'=>'App\Entity\Session',
                'choice_label'=>'Titre',
                'multiple'=>false,
                'expanded'=>false))
            ->add('formateur')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Formationn::class,
        ]);
    }
}
