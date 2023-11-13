<?php

namespace App\Form;

use App\Entity\AnimalBatch;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AnimalBatchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('especeAnimalBatch')
            ->add('sexeRation')
            ->add('poidsmaxRation')
            ->add('poidsminRation')
            ->add('ageAnimalBatch')
            ->add('nombreAnimalBatch')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => AnimalBatch::class,
        ]);
    }
}
