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
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Length(['max' => 255]),
                ],
            ])        
            ->add('sexeRation', ChoiceType::class, [
                'choices' => [
                    'female' => 'female',
                    'male' => 'male',
                ], 
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('poidsmaxRation', ChoiceType::class, [
                    'choices' => [
                        'female' => 'female',
                        'male' => 'male',
                    ], 
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Type(['type' => 'numeric']),
                ],
            ])
            ->add('poidsminRation', NumberType::class, [
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Type(['type' => 'numeric']),
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
