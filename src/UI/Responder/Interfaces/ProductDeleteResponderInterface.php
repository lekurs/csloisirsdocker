<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\JsonResponse;

interface ProductDeleteResponderInterface
{
    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse;
}
