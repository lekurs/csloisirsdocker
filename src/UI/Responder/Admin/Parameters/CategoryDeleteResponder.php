<?php


namespace App\UI\Responder\Admin\Parameters;


use App\UI\Responder\Interfaces\CategoryDeleteResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

final class CategoryDeleteResponder implements CategoryDeleteResponderInterface
{
    /**
     * @inheritDoc
     */
    public function response(): JsonResponse
    {
        return new JsonResponse(['success'], 200);
    }
}
