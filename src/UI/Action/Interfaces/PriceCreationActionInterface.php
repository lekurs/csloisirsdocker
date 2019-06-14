<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\PriceCreationHandlerInterface;
use App\UI\Responder\Interfaces\PriceCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface PriceCreationActionInterface
{
    /**
     * PriceCreationActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param PriceCreationHandlerInterface $priceCreationHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        PriceCreationHandlerInterface $priceCreationHandler
    );

    /**
     * @param Request $request
     * @param PriceCreationResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, PriceCreationResponderInterface $responder): Response;
}
