<?php


namespace App\Domain\Handler\Message;


use App\Domain\Handler\Interfaces\ReceiveContactFormHandlerInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ReceiveContactFormHandler implements ReceiveContactFormHandlerInterface
{
    private $session;

    private $validator;

    /**
     * ReceiveContactFormHandler constructor.
     *
     * @inheritDoc
     */
    public function __construct(SessionInterface $session, ValidatorInterface $validator)
    {
        $this->session = $session;
        $this->validator = $validator;
    }

    /**
     * @inheritDoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            if ($form->getData()->rgpd === []) {

                return false;
            } else {

            }
                $this->session->getFlashBag()->add('success', 'Votre demande de contact à bien été prise en compte');

            return true;
        }

        return false;
    }
}