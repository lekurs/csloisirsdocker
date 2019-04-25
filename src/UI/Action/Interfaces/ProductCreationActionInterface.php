<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\ProductCreationFormHandlerInterface;
use App\UI\Responder\Interfaces\ProductCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ProductCreationActionInterface
{
    /**
     * ProductCreationActionInterface constructor.
     *
     * @param ProductCreationFormHandlerInterface $productCreationFormHandler
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(
        ProductCreationFormHandlerInterface $productCreationFormHandler,
        FormFactoryInterface $formFactory
    );

    /**
     * @param Request $request
     * @param ProductCreationResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, ProductCreationResponderInterface $responder): Response;
}
