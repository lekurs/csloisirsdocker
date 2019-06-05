<?php


namespace App\Domain\Form\Formations;


use App\Domain\DTO\Admin\Formations\FormationEditFormDTO;
use App\Domain\DTO\Interfaces\FormationEditFormDTOInterface;
use App\Domain\Models\Area;
use App\Subscriber\Interfaces\FormationEditSlugSubscriberInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class FormationEditForm extends AbstractType
{
    /**
     * @var FormationEditSlugSubscriberInterface
     */
    private $formationEditSlugSubscriber;

    /**
     * FormationEditForm constructor.
     *
     * @param FormationEditSlugSubscriberInterface $formationEditSlugSubscriber
     */
    public function __construct(FormationEditSlugSubscriberInterface $formationEditSlugSubscriber)
    {
        $this->formationEditSlugSubscriber = $formationEditSlugSubscriber;
    }

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('startDate', DateType::class, [
                'widget' => 'single_text',
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Date de début de stage *',
                'required' => true,
            ])
            ->add('endDate', DateType::class, [
                'widget' => 'single_text',
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Date de fin de stage *',
                'required' => true,
            ])
            ->add('title', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Titre du stage *',
                'required' => true,
            ])
            ->add('description', TextareaType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-area', 'placeholder' => ' '],
                'label' => 'Titre du stage *',
                'required' => true,
            ])
            ->add('area', EntityType::class, [
                'class' => Area::class,
                'choice_label' => 'name',
                'label' => 'Lieu du stage'
            ])
            ->add('price', IntegerType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Prix du stage ',
                'required' => false,
            ])
            ->add('availableSeats', IntegerType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Nombre de place disponibles',
                'required' => false,
            ])
        ->addEventSubscriber($this->formationEditSlugSubscriber);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
                                   'data_class' => FormationEditFormDTOInterface::class,
                                   'empty_data' => function (FormInterface $form) {
                                       return new FormationEditFormDTO(
                                           $form->get('startDate')->getData(),
                                           $form->get('endDate')->getData(),
                                           $form->get('title')->getData(),
                                           $form->get('description')->getData(),
                                           $form->get('area')->getData(),
                                           $form->get('slug')->getData(),
                                           $form->get('price')->getData(),
                                           $form->get('availableSeats')->getData()
                                       );
                                   }
                               ]);
    }
}