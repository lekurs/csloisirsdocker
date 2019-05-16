<?php


namespace App\UI\Responder\Admin\Products;


use App\UI\Responder\Interfaces\ImageEditMainResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

final class ImageEditMainResponder implements ImageEditMainResponderInterface
{
    public function response(): JsonResponse
    {
        return new JsonResponse(['success'], 200);
    }
}
