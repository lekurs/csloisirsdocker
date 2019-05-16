<?php


namespace App\UI\Responder\Admin\Products;


use App\UI\Responder\Interfaces\ImageDeleteResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ImageDeleteResponder implements ImageDeleteResponderInterface
{
    public function response(): JsonResponse
    {
        return new JsonResponse(['success'], 200);
    }
}
