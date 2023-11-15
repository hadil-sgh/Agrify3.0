<?php

namespace App\Form;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

use App\Entity\TypedeReclamation;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class TypedeReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('type')
            ->add('description',  TextareaType::class, [
                'attr' => ['maxlength' => 200], // Set maximum length to 200 words
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => TypedeReclamation::class,
        ]);
    }
}
