<?php


namespace App\UI\Responder\Admin\Products;


use App\UI\Responder\Interfaces\ImageProductAddOnUpdateResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

class ImageProductAddOnUpdateResponder implements ImageProductAddOnUpdateResponderInterface
{
    public function response(): JsonResponse
    {
        return new JsonResponse();
    }
}