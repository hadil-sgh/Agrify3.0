<?php

namespace App\Form;

use App\Entity\Presence;
use Symfony\Component\Form\AbstractType;
use App\Repository\UserRepository;  // Add the UserRepository
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\User;

class Presence1Type extends AbstractType
{
   

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user', EntityType::class, [
                  'class' => User::class,
                  'choice_label' => 'User_id', 
                   'placeholder' => 'Select User',
        ])
            ->add('date', null, [
                'attr' => ['placeholder' => 'Select a Date'],
            ])
            ->add('presenceState', ChoiceType::class, [
                'choices' => [
                    'Absent' => 'Absent',
                    'Present' => 'Present',
                ],
                'placeholder' => 'Select Presence State',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Presence::class,
        ]);
    }


}
