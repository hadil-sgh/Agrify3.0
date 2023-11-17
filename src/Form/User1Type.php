<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class User1Type extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('user_nom',TextType::class, [
                'attr' => ['placeholder' => 'Enter an Last Name'],
            ])
            ->add('user_prenom',TextType::class, [
                'attr' => ['placeholder' => 'Enter an First Name'],
            ])
            ->add('user_email',TextType::class, [
                'attr' => ['placeholder' => 'Enter an Email'],
            ])
            ->add('user_telephone',TextType::class, [
                'attr' => ['placeholder' => 'Enter a Phone Number'],
            ])
            ->add('user_role', ChoiceType::class, [
                'choices' => [
                    'Chef' => 'Chef',
                    'Admin' => 'Admin',
                    'Veterinaire' => 'Veterinaire',
                ],
                'placeholder' => 'Role',
                'required' => true,
            ])
            ->add('user_genre', ChoiceType::class, [
                'choices' => [
                    'Homme' => 'Homme',
                    'Femme' => 'Femme',
                ],
                'placeholder' => 'Genre',
                'required' => true,
            ])
            ->add('user_nbrabscence',TextType::class, [
                'attr' => ['placeholder' => 'Enter How many Abscence He Got'],
            ])
            ->add('username',TextType::class, [
                'attr' => ['placeholder' => 'Enter a USERNAME'],
            ])
            ->add('password',TextType::class, [
                'attr' => ['placeholder' => 'Enter a PASSWORD'],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
