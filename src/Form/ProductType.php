<?php

namespace App\Form;

use App\Entity\Product;
use App\Entity\ProductType as EntityProductType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('elden_price')
            ->add('posta_price')
            ->add('vakif_price')
            ->add('product_type', EntityType::class, [
                'label' => 'Tip',
                'class' => EntityProductType::class,
                'choice_label' => function ($type) {
                    return $type->getName();
                }
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
