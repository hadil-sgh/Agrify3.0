<?php

namespace App\Form;

use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 

class Ingredient1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('nameIngredient')
            ->add('itemQuantityIngredient')
            ->add('unitIngredient')
            ->add('costIngredient')
            ->add('loadedByIngredient')
            ->add('descriptionIngredient')
            ->add('typeIngredient')
            ->add('nutrimentPrincipalIngredient')
            ->add('ration', EntityType::class, [
                'class' => 'App\Entity\Ration',
                'choice_label' => 'especeRation',
                'placeholder' => 'Select Ration',
            ])
            ->add('nutritionalValue', EntityType::class, [
                'class' => 'App\Entity\NutritionalValue',
                'choice_label' => 'id',
                'placeholder' => 'Select Nutritional Value',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ingredient::class,
        ]);
    }
}
