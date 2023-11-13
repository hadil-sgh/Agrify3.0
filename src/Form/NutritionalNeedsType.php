<?php

namespace App\Form;

use App\Entity\NutritionalNeeds;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NutritionalNeedsType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('especeBesoinNutritionnel')
            ->add('statutProductionBesoinNutritionnel')
            ->add('sexeBesoinNutritionnel')
            ->add('poidsMinBesoinNutritionnel')
            ->add('poidsMaxBesoinNutritionnel')
            ->add('buteProductionBesoinNutritionnel')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NutritionalNeeds::class,
        ]);
    }
}
