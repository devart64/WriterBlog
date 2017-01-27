<?php
/**
 * Created by PhpStorm.
 * User: monark
 * Date: 22/01/2017
 * Time: 12:20
 */

namespace WriterBlog\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
class RegisterType extends AbstractType
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
            ]);
    }

    public function getUsername()
    {
        return 'user';
    }
}
