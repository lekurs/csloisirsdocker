<?php


namespace App\Domain\Form\Prices;


use App\Domain\DTO\Admin\Parameters\PriceCreationFormDTO;
use App\Domain\DTO\Interfaces\PriceCreationFormDTOInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PriceCreationForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('price', NumberType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Prix *',
                'required' => true,
            ])
            ->add('title', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Intitulé de la prestation *',
                'required' => true,
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => PriceCreationFormDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new PriceCreationFormDTO(
                    $form->get('price')->getData(),
                    $form->get('title')->getData()
                );
            }
            ]);
    }
}