<?php

namespace App\Form;

use App\Entity\Newborns;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;

class Newborns1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('sexe', ChoiceType::class, [
                'choices' => [
                    'female' => 'female',
                    'male' => 'male',
                ], 
                'attr' => [
                    'maxlength' => 255,
                ],
            ])
            ->add('dateNaissance', DateType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Date(),
                ],
            ])
            ->add('espece', ChoiceType::class, [
                'choice' =>[
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
            ->add('poids', NumberType::class, [
                'attr' => [
                    'type' => 'numeric',
                ],
            ])
            ->add('gestation', EntityType::class, [
                'class' => 'App\Entity\Gestation',
                'choice_label' => 'espece',
                'placeholder' => 'Select Gestation',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Newborns::class,
        ]);
    }
}
