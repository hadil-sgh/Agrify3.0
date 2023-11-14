<?php

namespace App\Form;

use App\Entity\Ingredient;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

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
            ->add('ration')
            ->add('nutritionalValue')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ingredient::class,
        ]);
    }
}
