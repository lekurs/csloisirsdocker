<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Responder\Interfaces\ProductDeleteResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

interface ProductDeleteActionInterface
{
    /**
     * ProductDeleteActionInterface constructor.
     *
     * @param ProductRepositoryInterface $productRepo
     */
    public function __construct(ProductRepositoryInterface $productRepo);

    /**
     * @param Request $request
     * @param ProductDeleteResponderInterface $responder
     * @return JsonResponse
     */
    public function __invoke(Request $request, ProductDeleteResponderInterface $responder): JsonResponse;
}
