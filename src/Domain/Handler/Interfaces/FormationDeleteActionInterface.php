<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Repository\Interfaces\FormationRepositoryInterface;
use App\UI\Responder\Interfaces\FormationDeleteResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface FormationDeleteActionInterface
{
    /**
     * FormationDeleteActionInterface constructor.
     *
     * @param FormationRepositoryInterface $formationRepo
     * @param SessionInterface $session
     */
    public function __construct(
        FormationRepositoryInterface $formationRepo,
        SessionInterface $session
    );

    /**
     * @param Request $request
     * @param FormationDeleteResponderInterface $responder
     * @return JsonResponse
     */
    public function __invoke(Request $request, FormationDeleteResponderInterface $responder): JsonResponse;
}
