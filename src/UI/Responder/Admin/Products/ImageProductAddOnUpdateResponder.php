<?php


namespace App\UI\Responder\Admin\Products;


use App\UI\Responder\Interfaces\ImageProductAddOnUpdateResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

class ImageProductAddOnUpdateResponder implements ImageProductAddOnUpdateResponderInterface
{
    public function response(): JsonResponse
    {
        return new JsonResponse(['success'], 200);
    }
}