<?php


namespace App\UI\Responder\Admin\Parameters;


use App\UI\Responder\Interfaces\CategoryEditResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

final class CategoryEditResponder implements CategoryEditResponderInterface
{
    /**
     * @inheritDoc
     */
    public function response(): JsonResponse
    {
        return new JsonResponse(['success'], 200);
    }
}
