<?php

namespace App\Form;

use App\Entity\Books;
use App\Form\AuthorChoiceType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;

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
            ->add('authors', CollectionType::class, [
                'label' => false,

                // Liste deroulante
                'entry_type' => AuthorChoiceType::class,
                'entry_options' => [
                ],

                // Autorise l'ajout ou la suppression de la liste
                "allow_add" => true,
                "allow_delete" => true,

            ])
            
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
