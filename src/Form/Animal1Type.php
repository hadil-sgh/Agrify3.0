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
use Symfony\Component\Validator\Constraints as Assert;
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
            'placeholder' => 'espece',
            'required' => true,
            'attr' => [
                'maxlength' => 255,
            ],
            'constraints' => [
                new Assert\NotBlank(['message' => "Choisissez l'espèce de votre animal."]),
                // Do not include the Assert\DateTime constraint
            ],
        ])
        
        ->add('sexe', ChoiceType::class, [
            'choices' => [
                'female' => 'female',
                'male' => 'male',
            ], 
            'placeholder' => 'sexe',
            'required' => true,
            'constraints' => [
                new Assert\NotBlank(['message' => 'Please select the sexe of the animal (Bovins, Ovins, Volaille, Caprins, etc.']),
                // Do not include the Assert\DateTime constraint
            ],
        ])
        ->add('poids', NumberType::class, [
            'attr' => [
                'type' => 'numeric',
            ],
            'constraints' => [
                new \Symfony\Component\Validator\Constraints\Range([
                    'min' => 1,
                    'max' => 2000,
                    'minMessage' => "Le poids doit être d'au moins 1 .",
                    'maxMessage' => 'Le poids ne peut pas dépasser 2000 .',
                ]),
                new Assert\NotBlank(['message' => 'Please enter the weight of the animal.']),
            ],
        ])
        
        ->add('unitAnimal', ChoiceType::class, [
            'choices'=> [ 
                'kg' => 'kg',
                'gram' => 'gram',
            ],
            'constraints' => [
                new Assert\NotBlank(['message' => 'it cannot be blank.']),
                new Assert\Length(['max' => 255]),
            ],
        ])
        ->add('age', TextType::class, [
            'attr' => [
                'maxlength' => 255,
            ],
            'constraints' => [
                new Assert\Regex([
                    'pattern' => '/^\d+\s+(jour|semaine|mois|an|jours|semaines|ans)$/i',
                    'message' => "Format d'âge invalide. Veuillez utiliser un nombre suivi d'une spécification de période (par exemple, 1 mois, 2 semaines, 3 ans, etc.).",
                ]),
                new Assert\NotBlank(['message' => 'Please select the poids of the animal (Bovins, Ovins, Volaille, Caprins, etc.']),
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
