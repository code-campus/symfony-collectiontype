<?php

namespace App\Form;

use App\Entity\Authors;
use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AuthorChoiceType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('author', EntityType::class, [
                'class' => Authors::class,

                'attr' => [
                    'class' => 'form-control'
                ],

                'query_builder' => function (EntityRepository $er) {
                    return $er->createQueryBuilder('a')
                        ->orderBy('a.lastname', 'ASC')
                    ;
                },

                // 'choice_label' => 'nickname',
                'choice_label' => function ($author) {
                    $label = $author->getFirstname();
                    $label.= " ";
                    $label.= $author->getLastname();

                    if (!empty($author->getNickname()))
                    {
                        $label.= " (".$author->getNickname().")";
                    }

                    return $label;
                },
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
