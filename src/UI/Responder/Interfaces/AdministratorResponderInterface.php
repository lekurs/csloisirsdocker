<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface AdministratorResponderInterface
{
    /**
     * AdministratorResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param FormInterface $form
     * @return Response
     */
    public function response(FormInterface $form): Response;
}
