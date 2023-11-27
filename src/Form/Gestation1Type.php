<?php

namespace App\Form;

use App\Entity\Gestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
class Gestation1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('espece', ChoiceType::class, [
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
                'placeholder' => 'espece',
                'required' => true,
                'attr' => [
                'maxlength' => 255,
                'constraints' => [
                    new Assert\NotBlank(['message' => "Choisissez l'espèce de votre animal."]),
                    // Do not include the Assert\DateTime constraint
                ],
            ],
            ])
            ->add('preparationVelage', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'constraints' => [
                    new Assert\NotBlank(['message' => 'selecter le date .']),
                    // Do not include the Assert\DateTime constraint
                ],
            ])
            
            ->add('velagePrevu', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'constraints' => [
                    new Assert\NotBlank(['message' => 'selecter le date .']),
                    // Do not include the Assert\DateTime constraint
                ],
            ])
            ->add('dateAvertissement', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'constraints' => [
                    new Assert\NotBlank(['message' => 'selecter le date .']),
                ],
            ])
            ->add('animal', EntityType::class, [
                'class' => 'App\Entity\Animal',
                'choice_label' => 'espece',
                'placeholder' => 'Select Animal',
            ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gestation::class,
        ]);
        
    }
}
