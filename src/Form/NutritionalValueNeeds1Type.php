<?php

namespace App\Form;

use App\Entity\NutritionalValueNeeds;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class NutritionalValueNeeds1Type extends AbstractType
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
            ->add('nutritionalNeeds')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NutritionalValueNeeds::class,
        ]);
    }
}
