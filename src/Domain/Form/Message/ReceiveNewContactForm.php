<?php


namespace App\Domain\Form\Message;


use App\Domain\DTO\Admin\Message\ReceiveNewContactDTO;
use App\Domain\DTO\Interfaces\ReceiveNewContactDTOInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ReceiveNewContactForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('name', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Nom : *',
                'required' => true,
            ])
            ->add('lastName', TextType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Prénom *',
                'required' => true,
            ])
            ->add('phone', NumberType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Numéro de téléphone *',
                'required' => true,
            ])
            ->add('email', EmailType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-input', 'placeholder' => ' '],
                'label' => 'Votre email@email.com *',
                'required' => true,
            ])
            ->add('message', TextareaType::class, [
                'label_attr' => ['class' => 'float'],
                'attr' => ['class' => 'floating-textarea', 'placeholder' => ' ', 'rows' => 10],
                'label' => 'Votre message *',
                'required' => true,
            ])
            ->add('rgpd', ChoiceType::class, [
                'expanded' => true,
                'multiple' => true,
                'required' => true,
                'label' => '',
                'label_attr' => ['class' => 'no-label'],
                'attr' => ['class' => 'rgpd-container'],
                'choices' => ['ok']
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => ReceiveNewContactDTOInterface::class,
            'empty_data' => function (FormInterface $form) {
                return new ReceiveNewContactDTO(
                    $form->get('name')->getData(),
                    $form->get('lastName')->getData(),
                    $form->get('phone')->getData(),
                    $form->get('email')->getData(),
                    $form->get('message')->getData(),
                    $form->get('rgpd')->getData()
                );
            }
            ]);
    }
}
