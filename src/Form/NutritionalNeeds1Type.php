<?php

namespace App\Form;

use App\Entity\NutritionalNeeds;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 

class NutritionalNeeds1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('speciesNeeds', ChoiceType::class, [
            'choices' => [
                'Bovins' => [
                    'Bovins' => 'Bovins',
                    'vaches' => 'vaches',
                    'taureaux' => 'taureaux',
                ],
                'Ovins' => [
                    'Moutons' => 'Moutons',
                ],
                'Volaille' => [
                    'poulets' => 'poulets',
                    'canards' => 'canards',
                    'dindes' => 'dindes',
                ],
                'Caprins' => [
                    'Chèvres' => 'Chèvres',
                ],
            ],
                'required' => true,
                'attr' => [
                    'maxlength' => 255,
                ],
            ])
            ->add('productionStatusNeeds', ChoiceType::class, [
                'choices' => [
                    'en gestation' => 'en gestation',
                    '****' => '****',
                    '***' => '***',
                    '***' => '***',
                    'autre' => 'autre',
                ], 
                'attr' => [
                    'maxlength' => 255,
                ],
            ])
            ->add('sexNeeds', ChoiceType::class, [
                'choices' => [
    'féminin' => 'féminin',
    'masculin' => 'masculin',
],
                'attr' => [
                    'maxlength' => 255,
                ],
            ])
            ->add('minimumWeightNeeds', NumberType::class, [
                'attr' => [
                    'type' => 'numeric',
                ],
            ])
            ->add('maximumWeightNeeds', NumberType::class, [
                'attr' => [
                    'type' => 'numeric',
                ],
            ])
            ->add('productionGoalNeeds')
            ->add('nutritionalValueNeeds', EntityType::class, [
                'class' => 'App\Entity\NutritionalValueNeeds',
                'choice_label' => 'id',
                'placeholder' => 'Select Nutritional Value',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NutritionalNeeds::class,
        ]);
    }
}
