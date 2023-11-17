<?php

namespace App\Form;

use App\Entity\Animal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; // Make sure to include this line


class Animal1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('espece')
            ->add('sexe')
            ->add('poids')
            ->add('age')
            ->add('animalbatch', EntityType::class, [
                'class' => 'App\Entity\AnimalBatch',
                'choice_label' => 'especeAnimalBatch', // Change to the property you want to display
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
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Animal::class,
            'class' => AnimalBatch::class, // Replace AnimalBatch with the actual class name of your associated entity
            'choice_label' => 'especeAnimalBatch', // Replace 'name' with the property you want to display in the dropdown
            'placeholder' => 'Select Animal Batch', // Optional placeholder text
        ]);
    }
}
