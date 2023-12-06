<?php

namespace App\Form;

use App\Entity\NutritionalValueNeeds;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType; 

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
            ->add('nutritionalNeeds', EntityType::class, [
                'class' => 'App\Entity\NutritionalNeeds',
                'choice_label' => 'id',
                'placeholder' => 'Select Nutritional Value',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => NutritionalValueNeeds::class,
        ]);
    }
}
