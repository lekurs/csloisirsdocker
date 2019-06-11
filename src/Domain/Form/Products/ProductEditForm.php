<?php


namespace App\Domain\Form\Products;


use App\Domain\DTO\Admin\Products\ProductEditFormDTO;
use App\Domain\DTO\Interfaces\ProductEditFormDTOInterface;
use App\Domain\Models\Category;
use App\Subscriber\Interfaces\ProductEditSlugSubscriberInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

final class ProductEditForm extends AbstractType
{
    /**
     * @var ProductEditSlugSubscriberInterface
     */
    private $editSlugSubscriber;

    /**
     * ProductEditForm constructor.
     *
     * @param ProductEditSlugSubscriberInterface $editSlugSubscriber
     */
    public function __construct(ProductEditSlugSubscriberInterface $editSlugSubscriber)
    {
        $this->editSlugSubscriber = $editSlugSubscriber;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Nom du produit *',
                'required' => true,
            ])
            ->add('description', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Description du produit *',
                'required' => true,
            ])
            ->add('category', EntityType::class, [
                'class' => Category::class,
                'choice_label' => 'category',
            ])
            ->addEventSubscriber($this->editSlugSubscriber);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ProductEditFormDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new ProductEditFormDTO(
                    $form->getData()->title,
                    $form->getData()->description,
                    $form->getData()->category,
                    $form->getData()->slug
                );
            }
            ]);
    }
}