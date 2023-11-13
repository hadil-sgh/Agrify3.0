<?php

namespace App\Form;

use App\Entity\Gestation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class GestationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('espece')
            ->add('preparationVêlage')
            ->add('vêlagePrévu')
            ->add('dateAvertissement')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Gestation::class,
        ]);
    }
}
