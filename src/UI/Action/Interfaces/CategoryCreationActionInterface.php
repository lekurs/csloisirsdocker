<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\CategoryCreationFormHandlerInterface;
use App\UI\Responder\Interfaces\CategoryCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface CategoryCreationActionInterface
{
    /**
     * CategoryCreationActionInterface constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CategoryCreationFormHandlerInterface $categoryCreationHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        CategoryCreationFormHandlerInterface $categoryCreationHandler
    );

    /**
     * @param Request $request
     * @param CategoryCreationResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, CategoryCreationResponderInterface $responder): Response;
}
