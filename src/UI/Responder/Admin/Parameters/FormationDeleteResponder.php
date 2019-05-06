<?php


namespace App\UI\Responder\Admin\Parameters;


use App\UI\Responder\Interfaces\FormationDeleteResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;

final class FormationDeleteResponder implements FormationDeleteResponderInterface
{
    /**
     * @inheritDoc
     */
    public function response(): JsonResponse
    {
        return new JsonResponse('success', 200);
    }
}
