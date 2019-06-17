<?php


namespace App\Domain\Handler\Interfaces;


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
     */
    public function __construct(SessionInterface $session, ValidatorInterface $validator);

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
