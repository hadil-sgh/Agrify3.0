<?php

namespace App\Form;

use App\Entity\Field;
use App\Repository\UserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class Field1Type extends AbstractType
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $usernames = $this->userRepository->getUsernames();

        $builder
            ->add('field_Nom', TextType::class, [
                'attr' => ['placeholder' => 'Enter a Field Name'],
            ])
            ->add('field_chef', ChoiceType::class, [
                'choices' => $this->getUsernamesChoices($usernames),
                'placeholder' => 'Choose a username',
                'required' => true,
            ])
            ->add('field_type', TextType::class, [
                'attr' => ['placeholder' => 'Enter a Field Type'],
            ])
            ->add('field_Superficie' ,null, [
                'attr' => ['placeholder' => 'Enter the Field superficy'],
            ])
            ->add('field_quantity', null, [
                'attr' => ['placeholder' => 'Enter a Max Quantity a field can support'],
            ]);
    }

    private function getUsernamesChoices(array $usernames): array
    {
        $choices = [];
        foreach ($usernames as $username) {
            $choices[$username] = $username;
        }

        return $choices;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Field::class,
        ]);
    }
}
