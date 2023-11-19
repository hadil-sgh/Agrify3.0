<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use App\Entity\Maladie;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MaladieType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('animalId')
            ->add('medicament')
            ->add('typeDeTraitement', ChoiceType::class, [
                'choices' => [
                    'vaccination' => 'vaccination',
                    'medicament a avaler' => 'medicament a avaler',
                    'Opération' => 'Opération',

                ],
                'placeholder' => 'type De Traitement',
                'required' => true,
            ])
            ->add('dosage',  TextareaType::class, [
                'attr' => ['maxlength' => 200],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Maladie::class,
        ]);
    }
}
