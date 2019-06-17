<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\ReceiveContactFormHandlerInterface;
use App\Services\Interfaces\NavigationHelperInterface;
use App\UI\Responder\Interfaces\ReceiveContactResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ReceiveContactActionInterface
{
    /**
     * ReceiveContactActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param ReceiveContactFormHandlerInterface $receiveContactFormHandler
     * @param NavigationHelperInterface $navHelper
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        ReceiveContactFormHandlerInterface $receiveContactFormHandler,
        NavigationHelperInterface $navHelper
    );

    /**
     * @param Request $request
     * @param ReceiveContactResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, ReceiveContactResponderInterface $responder): Response;
}
