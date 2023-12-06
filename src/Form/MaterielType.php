<?php

namespace App\Form;

use App\Entity\Materiel;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class MaterielType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type', ChoiceType::class, [
                'label' => 'Type',
                'choices' => [
                    'Vehicule' => 'Vehicule',
                    'Outil' => 'Outil',
                    'Silo de Stockage' => 'Silo de Stockage',
                ],
                'expanded' => false, // This makes it a dropdown
                'multiple' => false, // This allows selecting only one option
                'required' => false,
            ])

            ->add('etat')
            ->add('capacite_masse')
            ->add('capacite_volume')
            ->add('prix')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Materiel::class,
        ]);
    }
}
