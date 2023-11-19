<?php

namespace App\Form;

use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 
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
                ],
            ])
            ->add('unitIngredient', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('costIngredient', NumberType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Type(['type' => 'numeric']),
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
            ->add('typeIngredient', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('nutrimentPrincipalIngredient', TextType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
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
