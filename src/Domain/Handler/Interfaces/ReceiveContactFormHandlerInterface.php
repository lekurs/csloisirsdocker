<?php


namespace App\Domain\Handler\Interfaces;


use App\Services\Interfaces\MailerHelperInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface ReceiveContactFormHandlerInterface
{
    /**
     * ReceiveContactFormHandlerInterface constructor.
     *
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     * @param MailerHelperInterface $mailerHelper
     */
    public function __construct(SessionInterface $session, ValidatorInterface $validator, MailerHelperInterface $mailerHelper);

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
