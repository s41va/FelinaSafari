<?php

namespace App\Form;

use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\IntegerType;
use PharIo\Manifest\Email;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\RepeatedType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class SignUpType
{
    public function buildform(FormBuilderInterface $builder, array $options){
        $builder
            ->add('username', TextType::class, [
                'label' => 'Nombre de usuario',
                'attr' => ['placeholder' => 'Introduce tu usuario'],
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'label' => 'Email',
                'attr' => ['placeholder' => 'Introduce tu email'],
                'required' => true,
            ])
            ->add('password', RepeatedType::class, [
                'type' => PasswordType::class,
                'invalid_message' => 'Las contraseñas deben coincidir.',
                'first_options' => ['label' => 'Contraseña', 'attr' => ['placeholder' => 'Contraseña']],
                'second_options' => ['label' => 'Repite la contraseña', 'attr' => ['placeholder' =>
                    'Repite la contraseña']],
                'required' => true,
            ])
            ->add('telefono', IntegerType::class, [
                'label' => 'Numero de telefono',
                'attr' => ['placeholder' => 'Introduce tu numero de telefono'],
                'required' => true,
            ])
            ->add('fechaCreacion', DateType::class, [
                'label' => 'Fecha de Creacion del Usuario',
                'attr' => ['placeholder' => 'Introduce la fecha del dia de hoy'],
                'required' => false,
            ])
            ->add('login', SubmitType::class, [
                'label' => 'Iniciar sesión',
                'attr' => ['class' => 'btn btn-primary mt-3'],
            ]);
    }
}
