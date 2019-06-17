<?php


namespace App\UI\Action\Interfaces;


use App\UI\Responder\Interfaces\AdministratorResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface AdministratorActionInterface
{
    /**
     * AdministratorActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory);

    /**
     * @param Request $request
     * @param AdministratorResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, AdministratorResponderInterface $responder): Response;
}
