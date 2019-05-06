<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\JsonResponse;

interface CategoryDeleteResponderInterface
{
    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse;
}
