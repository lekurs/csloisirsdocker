<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\AreaCreationFormHandlerInterface;
use App\UI\Responder\Interfaces\AreaCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface AreaCreationActionInterface
{
    /**
     * AreaCreationActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param AreaCreationFormHandlerInterface $areaCreationFormHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        AreaCreationFormHandlerInterface $areaCreationFormHandler
    );

    /**
     * @param Request $request
     * @param AreaCreationResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, AreaCreationResponderInterface $responder): Response;
}
