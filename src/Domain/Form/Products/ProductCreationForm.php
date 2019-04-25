<?php


namespace App\Domain\Form\Products;


use App\Domain\DTO\Admin\Products\ProductCreationFormDTO;
use App\Domain\Models\Category;
use Doctrine\ORM\Mapping\UniqueConstraint;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductCreationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextareaType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Nom du produit *',
                'required' => true,
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'category',
            ])
        ->add('images', CollectionType::class, [
            'prototype' => true,
            'allow_add' => true,
            'allow_extra_fields' => true,
            'allow_delete' => true,
            'entry_type' => ImageUploadForm::class
        ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProductCreationFormDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new ProductCreationFormDTO(
                    $form->get('title')->getData(),
                    $form->get('category')->getData(),
                    $form->get('images')->getData()
                );
            }
            ]);
    }
}