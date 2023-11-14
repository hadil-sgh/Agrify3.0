<?php

namespace App\Form;

use App\Entity\Ration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Ration1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('especeRation')
            ->add('statutRation')
            ->add('sexeRation')
            ->add('poidsMinRation')
            ->add('poidsMaxRation')
            ->add('buteProductionRation')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Ration::class,
        ]);
    }
}
