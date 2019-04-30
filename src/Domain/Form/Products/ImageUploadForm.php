<?php


namespace App\Domain\Form\Products;


use App\Domain\DTO\Admin\Products\ImageUploadFormDTO;
use App\Domain\DTO\Interfaces\ImageUploadFormDTOInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageUploadForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('uploadedFile', FileType::class);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ImageUploadFormDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new ImageUploadFormDTO($form->get('uploadedFile')->getData());
            }
            ]);
    }
}