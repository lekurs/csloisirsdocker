<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\JsonResponse;

interface ImageEditMainResponderInterface
{
    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse;
}
