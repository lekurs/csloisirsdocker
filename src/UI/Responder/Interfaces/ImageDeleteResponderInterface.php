<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\JsonResponse;

interface ImageDeleteResponderInterface
{
    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse;
}
