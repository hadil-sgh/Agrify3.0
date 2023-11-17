<?php

namespace App\Form;


use App\Entity\Reclamation;
use App\Entity\TypedeReclamation;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReclamationType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('rec_emp')
            ->add('rec_date')
            ->add('rec_description',  TextareaType::class, [
                'attr' => ['maxlength' => 200],
            ])
            ->add('rec_target', ChoiceType::class, [
                'choices' => [
                    'Chef d exécution d éleveurs' => 'Chef d exécution d éleveurs',
                    'Chef d exécution des agricoles' => 'Chef d exécution des agricoles',
                    'manageur de Stock' => 'manageur de Stock',
                    'vétérinaire' => 'vétérinaire',
                ],
                'placeholder' => 'Target',
                'required' => true,
            ])
            ->add('urgency', ChoiceType::class, [
                'choices' => [
                    'Urgent' => 'Urgent',
                    'pas Urgent' => 'pas Urgent',

                ],
                'expanded' => true,
                'multiple' => false,
                'label_attr' => ['class' => 'radio-group'],
            ])
            ->add('type_Rec',EntityType::class,[
             'class'=>TypedeReclamation::class,
                'choice_label'=>'type',
                'placeholder' => 'type de reclamation',
    ]);
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Reclamation::class,
        ]);
    }
}
