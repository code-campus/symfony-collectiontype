<?php

namespace App\Form;

use App\Entity\Books;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class BookType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            /* Title */
            ->add('title', TextType::class, [
                'label' => "Titre du livre",
                'attr' => ['class' => "form-control"]
            ])
            
            /* Description */
            ->add('description', TextareaType::class, [
                'label' => "Description du livre",
                'attr' => ['class' => "form-control"]
            ])
            
            /* Cover */
            // ->add('cover') // File
            
            /* Authors */
            // ->add('authors') // Collection
            
            /* Prices */
            // ->add('prices') // Collection
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Books::class,
        ]);
    }
}
