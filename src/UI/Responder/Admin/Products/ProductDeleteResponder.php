<?php


namespace App\UI\Responder\Admin\Products;


use App\UI\Responder\Interfaces\ProductDeleteResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ProductDeleteResponder implements ProductDeleteResponderInterface
{
    /**
     * @inheritDoc
     */
    public function response(): JsonResponse
    {
        return new JsonResponse(['success'], 200);
    }
}
