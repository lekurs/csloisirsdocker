<?php


namespace App\Domain\Form\Areas;


use App\Domain\DTO\Admin\Parameters\AreaCreationFormDTO;
use App\Domain\DTO\Interfaces\AreaCreationFormDTOInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class AreaCreationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Lieu *',
                'required' => true,
            ])
            ->add('address', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Adresse *',
                'required' => true,
            ])
            ->add('zip', IntegerType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Code postal *',
                'required' => true,
            ])
            ->add('city', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Ville *',
                'required' => true,
            ])
            ->add('image', FileType::class, [
                'label' => 'Photo du lieu de stage',
                'required' => false,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => AreaCreationFormDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new AreaCreationFormDTO(
                    $form->get('name')->getData(),
                    $form->get('address')->getData(),
                    $form->get('zip')->getData(),
                    $form->get('city')->getData(),
                    $form->get('image')->getData()
                    );
                }
            ]);
    }
}