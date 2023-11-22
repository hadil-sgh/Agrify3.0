<?php

namespace App\Form;

use App\Entity\Ration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class RationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('especeRation', ChoiceType::class, [
                'choices' => [
                    'Bovins' => 'Bovins',
                    'Ovins' => 'Ovins',
                    'Volaille' => 'Volaille',
                    'Caprins' => 'Caprins',
                ],
                'required' => true,
            ])
            ->add('statutRation')
            ->add('sexeRation', ChoiceType::class, [
                'choices' => [
                    'female' => 'female',
                    'male' => 'male',
                ], 
                
            ])
            ->add('poidsMinRation', NumberType::class, [
                'attr' => [
                    'type' => 'numeric',
                ],
            ])
            ->add('poidsMaxRation', NumberType::class, [
                'attr' => [
                    'type' => 'numeric',
                ],
            ])
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
