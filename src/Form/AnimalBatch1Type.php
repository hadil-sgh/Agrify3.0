<?php

namespace App\Form;

use App\Entity\AnimalBatch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class AnimalBatch1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('especeAnimalBatch', ChoiceType::class, [
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
            ->add('sexeRation', ChoiceType::class, [
                'choices' => [
                    'female' => 'female',
                    'male' => 'male',
                ], 
                'placeholder' => 'sexe',
                'required' => true,
                'attr' => [
                'maxlength' => 255,
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => "Choisissez le sexe de votre animal."]),
                    // Do not include the Assert\DateTime constraint
                ],
            ])
            ->add('poidsmaxRation', ChoiceType::class, [
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\Range([
                        'min' => 1,
                        'max' => 2000,
                        'minMessage' => 'The poids must be at least  1 .',
                        'maxMessage' => 'The poids cannot be greater than  2000 .',
                    ]),
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Type(['type' => 'numeric']),
                ],
            ])
            ->add('poidsminRation', NumberType::class, [
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\Range([
                        'min' => 1,
                        'max' => 2000,
                        'minMessage' => 'The poids must be at least  1 .',
                        'maxMessage' => 'The poids cannot be greater than  2000 .',
                    ]),
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Type(['type' => 'numeric']),
                    new Assert\Callback([
                        'callback' => [$this, 'validatePoidsMinRation'],
                        'payload' => ['poidsmaxRationField' => 'poidsmaxRation'], // Pass the field name for comparison
                    ]),
                ],
            ])
            
            ->add('ageAnimalBatch', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('nombreAnimalBatch', NumberType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Type(['type' => 'integer']),
                ],
            ]);
        }
    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AnimalBatch::class,
        ]);
    }
}
