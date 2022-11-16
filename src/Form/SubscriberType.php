<?php

namespace App\Form;

use App\Entity\City;
use App\Entity\Subscriber;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SubscriberType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('firstname', TextType::class, ['label'=>'Adı'])
            ->add('lastname', TextType::class, ['label'=>'Soyadı'])
            ->add('address', TextType::class, ['label'=>'Adres'])
            ->add('postalcode', TextType::class, ['label'=>'Posta kodu'])
            ->add('city', TextType::class, ['label'=>'Şehir'])
            ->add('telephone', TextType::class, ['label'=>'Telefon'])
            ->add('email', TextType::class, ['label'=>'E-posta'])
            ->add('sube', EntityType::class, [
                'label' => 'Şube',
                'class' => City::class,
                'choice_label' => function ($city) {
                    return $city->getName();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Subscriber::class,
        ]);
    }
}
