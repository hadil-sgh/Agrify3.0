<?php

namespace App\Form;

use App\Entity\Gestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
class Gestation1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('espece', ChoiceType::class, [
                'choices' => [
                    'female' => 'female',
                    'male' => 'male',
                ], 
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Length(['max' => 255]),
                ],
            ])
            ->add('preparationVelage', DateType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Date(),
                ],
            ])
            ->add('velagePrevu', DateType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Date(),
                ],
            ])
            ->add('dateAvertissement', DateType::class, [
                'widget' => 'single_text',
                'constraints' => [
                    new Assert\NotBlank(['message' => 'it cannot be blank.']),
                    new Assert\Date(),
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
