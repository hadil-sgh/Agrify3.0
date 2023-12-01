<?php

namespace App\Form;

use App\Entity\Newborns;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

class Newborns1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                'féminin' => 'féminin',
                'masculin' => 'masculin',
            ],
                'placeholder' => 'sexe',
                'required' => true,
            ])
            ->add('dateNaissance', DateTimeType::class, [
                'widget' => 'single_text',
                'html5' => true,
                'constraints' => [
                    new Assert\NotBlank(['message' => 'selecter le date .']),
                    // Do not include the Assert\DateTime constraint
                ],
            ])
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
                ],
                'invalid_message' => 'Please select the species of the animal (Bovins, Ovins, Volaille, Caprins, etc.)',
            ])
            ->add('poids', NumberType::class, [
                'attr' => [
                    'type' => 'numeric',
                ],
                'constraints' => [
                    new \Symfony\Component\Validator\Constraints\Range([
                        'min' => 1,
                        'max' => 40,
                        'minMessage' => "Le poids doit être d'au moins 1 .",
                        'maxMessage' => 'Le poids ne peut pas dépasser 40 .',
                    ]),
                ],
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
            'data_class' => Newborns::class,
        ]);
    }
}
