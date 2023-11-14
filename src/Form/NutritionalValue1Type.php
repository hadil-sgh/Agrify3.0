<?php

namespace App\Form;

use App\Entity\NutritionalValue;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NutritionalValue1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('pb')
            ->add('fb')
            ->add('adf')
            ->add('ndf')
            ->add('ms')
            ->add('eb')
            ->add('ca')
            ->add('p')
            ->add('mg')
            ->add('k')
            ->add('ingredient')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NutritionalValue::class,
        ]);
    }
}
