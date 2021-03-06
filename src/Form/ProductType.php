<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\File;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('name')
            ->add('description')
            ->add('image', FileType::class, [
                'mapped'=>false,
                'required'=>true,
                'constraints' => [
                    new File(
                        ['maxSize'=> '2M',
                         'maxSizeMessage'=> 'Votre fichier est trop lourd...',
                         'mimeTypes' => ['image/jpeg', 'image/png'],
                         'mimeTypesMessage'=>"Nous n'acceptons que les images de type JPG/PNG."
                        ])]])
            ->add('price')
            ->add('rating')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
