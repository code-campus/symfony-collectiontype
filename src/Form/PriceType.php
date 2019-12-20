<?php

namespace App\Form;

use App\Entity\BooksPrices;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PriceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            /* Quantity */
            ->add('quantity', NumberType::class,[
                'label' => "Quantité",
                'attr' => [
                    'class' => "form-control",
                    'step' => "1",
                ]
            ])
            
            /* Price */
            ->add('price', NumberType::class,[
                'label' => "Prix Unitaire",
                'attr' => [
                    'class' => "form-control",
                    'step' => "0.01",
                ]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => BooksPrices::class,
        ]);
    }
}
