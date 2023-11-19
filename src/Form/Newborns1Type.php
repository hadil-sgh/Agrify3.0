<?php

namespace App\Form;

use App\Entity\Newborns;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 

class Newborns1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sexe')
            ->add('dateNaissance')
            ->add('espece')
            ->add('poids')
            ->add('gestation', EntityType::class, [
                'class' => 'App\Entity\Gestation',
                'choice_label' => 'espece',
                'placeholder' => 'Select Gestation',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Newborns::class,
        ]);
    }
}
