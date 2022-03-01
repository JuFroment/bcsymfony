<?php

namespace App\Form;

use App\Entity\Category;

use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class SearchType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('searchBar', TextType::class, [
                'label'=>'Votre recherche',
                'required' => false,
                'attr'=>['class'=>'form-control']
            ])
            ->add('category', EntityType::class, [
                'label'=>'Categorie',
                'required' => false,
                'class'=> Category::class,
                'attr'=>['class'=>'form-control']
            ])
            ->add('rating', ChoiceType::class, [
                'label'=>'Note',
                'choices'=> [
                    '1 étoile' => 1,
                    '2 étoiles' => 2,
                    '3 étoiles' => 3,
                    '4 étoiles' => 4,
                    '5 étoiles' => 5,
                ],
                'expanded' => true,
                'required' => false,
                'multiple'=> true,
                'attr'=> ['class'=>'form-control']
            ])
            ->add('minPrice', NumberType::class, [
                'label'=>'Prix minimum',
                'required' => false,
                'attr'=> ['class'=>'form-control']
            ])
            ->add('maxPrice', NumberType::class, [
                'label'=>'Prix maximum',
                'required' => false,
                'attr'=> ['class'=>'form-control']
            ])
            ->add('Rechercher', SubmitType::class, [
                'attr'=>['class'=>'btn btn-success']
            ])
            //1h06
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
