<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\JsonResponse;

interface CategoryEditResponderInterface
{
    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse;
}
