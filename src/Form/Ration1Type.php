<?php

namespace App\Form;

use App\Entity\Ration;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
class Ration1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('especeRation', ChoiceType::class, [
            'choices' => [
                'Bovins' => [
                    'Bovins' => 'Bovins',
                    'vaches' => 'vaches',
                    'taureaux' => 'taureaux',
                ],
                'Ovins' => [
                    'Moutons' => 'Moutons',
                ],
                'Volaille' => [
                    'poulets' => 'poulets',
                    'canards' => 'canards',
                    'dindes' => 'dindes',
                ],
                'Caprins' => [
                    'Chèvres' => 'Chèvres',
                ],
            ],
                'required' => true,
            ])
            ->add('statutRation')
            ->add('sexeRation', ChoiceType::class, [
                'choices' => [
    'féminin' => 'féminin',
    'masculin' => 'masculin',
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
