<?php


namespace App\Domain\Form;


use App\Domain\DTO\Admin\Parameters\CategoryCreationFormDTO;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class CategoryCreationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
            'label_attr' => ['class' => 'float'],
            'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
            'label' => 'Nom de la catégorie *',
            'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => CategoryCreationFormDTO::class,
            'empty_data' => function (FormInterface $form) {
                return new CategoryCreationFormDTO(
                    $form->get('title')->getData()
                );
            }
            ]);
    }
}