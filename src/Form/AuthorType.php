<?php

namespace App\Form;

use App\Entity\Authors;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            
            /* Firstname */
            ->add('firstname', TextType::class, [
                'label' => "Prénom",
                'attr' => ['class' => "form-control"]
            ])
            
            /* Lastname */
            ->add('lastname', TextType::class, [
                'label' => "Nom",
                'attr' => ['class' => "form-control"]
            ])
            
            /* Nickname */
            ->add('nickname', TextType::class, [
                'label' => "Pseudo",
                'attr' => ['class' => "form-control"]
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Authors::class,
        ]);
    }
}
