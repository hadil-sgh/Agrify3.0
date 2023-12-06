<?php

namespace App\Form;

use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;

class Ingredient1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameIngredient', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('itemQuantityIngredient', NumberType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Type(['type' => 'numeric']),
                    new \Symfony\Component\Validator\Constraints\Range([
                        'min' => 1,
                        'max' => 10000,
                        'minMessage' => "Le quantite doit être d'au moins 1000 .",
                        'maxMessage' => 'Le quantite ne peut pas dépasser 10000 .',
                    ]),
                ],
            ])
            ->add('unitIngredient', ChoiceType::class, [
                'choices' => [
                    'gram' => 'gram',
                    'kg' => 'kg',
                    'tonne' => 'tonne',
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('costIngredient', NumberType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Type(['type' => 'numeric']),
                    new \Symfony\Component\Validator\Constraints\Range([
                        'min' => 0,
                        'max' => 10000,
                        'minMessage' => "Le prix doit être d'au moins 0 .",
                        'maxMessage' => 'Le prix ne peut pas dépasser 10000 .',
                ]),
            ],
            ])
            ->add('loadedByIngredient', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('descriptionIngredient', TextType::class, [
                'constraints' => [
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('typeIngredient', ChoiceType::class, [
                'choices' => [
                    'seul ingredient' => 'seul ingredient',
                    'sac de nutrition' => 'sac de nutrition',
                ],
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('nutrimentPrincipalIngredient', ChoiceType::class, [
                'choices' => [
                    'Minerals' => 'minerals',
                    'Fiber' => 'fiber',
                    'Energy' => 'energy',
                ],
                'expanded' => true, // This makes it render as checkboxes
                'multiple' => true, // This allows selecting multiple options
                'constraints' => [
                    new Assert\NotBlank(['message' => 'At least one option must be selected.']),
                ],
            ])
            ->add('ration', EntityType::class, [
                'class' => 'App\Entity\Ration',
                'choice_label' => 'especeRation',
                'placeholder' => 'Select Ration',
            ])
            ->add('nutritionalValue', EntityType::class, [
                'class' => 'App\Entity\NutritionalValue',
                'choice_label' => 'id',
                'placeholder' => 'Select Nutritional Value',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ingredient::class,
        ]);
    }
}
