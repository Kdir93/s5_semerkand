<?php

namespace App\Form;

use App\Entity\City;
use App\Entity\User;
use Symfony\Component\Form\CallbackTransformer;
use Symfony\Component\Form\AbstractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class UserType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('email')
            ->add('roles', ChoiceType::class,[
                'label' => 'Profil',
                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'=>[
                    "Şube" => "ROLE_USER",
                    "Bölge" => "ROLE_ADMIN" 
                ]
                
            ])
            ->add('password')
            ->add('name')
            ->add('city', EntityType::class, [
                'label' => 'Sube',
                'class' => City::class,
                'choice_label' => function ($city) {
                    return $city->getName();
                }
            ])
        ;

        // Data transformer
        $builder->get('roles')
            ->addModelTransformer(new CallbackTransformer(
                function ($rolesArray) {
                     // transform the array to a string
                     return count($rolesArray)? $rolesArray[0]: null;
                },
                function ($rolesString) {
                     // transform the string back to an array
                     return [$rolesString];
                }
        ));
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
