<?php

namespace App\Form;

use App\Entity\Animal;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Make sure to include this line
use Symfony\Component\Form\Extension\Core\Type\TextType;

class Animal1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    { 
         $builder
         ->add('espece', ChoiceType::class, [
            'choices' => [
                'Bovins' => 'Bovins',
                'Ovins' => 'Ovins',
                'Volaille' => 'Volaille',
                'Caprins' => 'Caprins',
            ],
            'required' => true,
            'attr' => [
                'maxlength' => 255,
            ],
        ])
        ->add('sexe', ChoiceType::class, [
            'choices' => [
                'female' => 'female',
                'male' => 'male',
            ], 
        ])
        ->add('poids', NumberType::class, [
            'attr' => [
                'type' => 'numeric',
            ],
        ])
        ->add('age', TextType::class, [
            'attr' => [
                'maxlength' => 255,
            ],
        ])
        ->add('animalbatch', EntityType::class, [
            'class' => 'App\Entity\AnimalBatch',
            'choice_label' => 'especeAnimalBatch',
            'placeholder' => 'Select Animal Batch',
        ])
        ->add('nutritionalNeeds', EntityType::class, [
            'class' => 'App\Entity\NutritionalNeeds',
            'choice_label' => 'speciesNeeds',
            'placeholder' => 'Select Nutritional Needs',
        ])
        ->add('ration', EntityType::class, [
            'class' => 'App\Entity\Ration',
            'choice_label' => 'especeRation',
            'placeholder' => 'Select Ration',
        ])
        ->add('gestation', EntityType::class, [
            'class' => 'App\Entity\Gestation',
            'choice_label' => 'espece',
            'placeholder' => 'Select Gestation',
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
        ]);
    }
}
