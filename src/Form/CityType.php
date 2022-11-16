<?php

namespace App\Form;

use App\Entity\City;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CityType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name', null, ['label'=> 'Şube adı'])
            ->add('adress', null, ['label'=> 'Adres'])
            ->add('postalcode', null, ['label'=> 'Posta kodu'])
            ->add('city', null, ['label'=> 'Şehir'])
            ->add('vasiflar', ChoiceType::class, [
                'label' => 'Vasıflar',
                'required' => true,
                'multiple' => false,
                'expanded' => false,
                'choices'=>[
                    "Büyük" => "Büyük",
                    "Orta" => "Orta",
                    "Küçük" => "Küçük",
                    "" => "" 
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => City::class,
        ]);
    }
}
