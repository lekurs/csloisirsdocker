<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Handler\Interfaces\ProductEditFormHandlerInterface;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Responder\Interfaces\ProductEditResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ProductEditActionInterface
{
    /**
     * ProductEditActionInterface constructor.
     *
     * @param ProductRepositoryInterface $productRepo
     * @param FormFactoryInterface $formFactory
     * @param ProductEditFormHandlerInterface $productEditFormHandler
     */
    public function __construct(
        ProductRepositoryInterface $productRepo,
        FormFactoryInterface $formFactory,
        ProductEditFormHandlerInterface $productEditFormHandler
    );

    /**
     * @param Request $request
     * @param ProductEditResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, ProductEditResponderInterface $responder): Response;
}
