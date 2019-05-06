<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\JsonResponse;

interface FormationDeleteResponderInterface
{
    /**
     * @return JsonResponse
     */
    public function response(): JsonResponse;
}
