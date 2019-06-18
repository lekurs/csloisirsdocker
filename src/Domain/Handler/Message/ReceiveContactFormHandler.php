<?php


namespace App\Domain\Handler\Message;


use App\Domain\Handler\Interfaces\ReceiveContactFormHandlerInterface;
use App\Services\Interfaces\MailerHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ReceiveContactFormHandler implements ReceiveContactFormHandlerInterface
{
    private $session;

    private $validator;

    private $mailerHelper;

    /**
     * ReceiveContactFormHandler constructor.
     *
     * @inheritDoc
     */
    public function __construct(SessionInterface $session, ValidatorInterface $validator, MailerHelperInterface $mailerHelper)
    {
        $this->session = $session;
        $this->validator = $validator;
        $this->mailerHelper = $mailerHelper;
    }

    /**
     * @inheritDoc
     */
    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

        $this->session->getFlashBag()->add('success', 'Votre demande de contact à bien été prise en compte');

        $this->mailerHelper->receiveContact($form->getData());

        return true;
        }

        return false;
    }
}