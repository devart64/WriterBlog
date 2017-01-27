<?php

namespace WriterBlog\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('username', TextType::class)
            ->add('password', RepeatedType::class, [
                'type'            => PasswordType::class,
                'invalid_message' => 'The password fields must match.',
                'options'         => ['required' => true],
                'first_options'   => ['label' => 'Password'],
                'second_options'  => ['label' => 'Repeat password'],
            ])
            ->add('role', ChoiceType::class, [
                'choices' => ['Admin' => 'ROLE_ADMIN',
                               'User' => 'ROLE_USER'
                ]
            ]);
    }

    public function getName()
    {
        return 'user';
    }
}
