<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\UI\Responder\Interfaces\CategoryDeleteResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface CategoryDeleteActionInterface
{
    /**
     * CategoryDeleteActionInterface constructor.
     *
     * @param CategoryRepositoryInterfaces $categoryRepo
     * @param SessionInterface $session
     */
    public function __construct(
        CategoryRepositoryInterfaces $categoryRepo,
        SessionInterface $session
    );

    /**
     * @param Request $request
     * @param CategoryDeleteResponderInterface $responder
     * @return JsonResponse
     */
    public function __invoke(Request $request, CategoryDeleteResponderInterface $responder): JsonResponse;
}
