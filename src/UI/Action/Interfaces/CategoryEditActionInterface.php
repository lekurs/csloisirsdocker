<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\Services\Interfaces\SlugHelperInterface;
use App\UI\Responder\Interfaces\CategoryEditResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

interface CategoryEditActionInterface
{
    /**
     * CategoryEditActionInterface constructor.
     *
     * @param CategoryRepositoryInterfaces $categoryRepo
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(CategoryRepositoryInterfaces $categoryRepo, SlugHelperInterface $slugHelper);

    /**
     * @param Request $request
     * @param CategoryEditResponderInterface $responder
     * @return JsonResponse
     */
    public function __invoke(Request $request, CategoryEditResponderInterface $responder): JsonResponse;
}
