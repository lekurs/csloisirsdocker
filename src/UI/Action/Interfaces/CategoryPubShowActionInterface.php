<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
use App\Services\Interfaces\NavigationHelperInterface;
use App\UI\Responder\Interfaces\CategoryPubShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface CategoryPubShowActionInterface
{
    /**
     * CategoryPubShowActionInterface constructor.
     *
     * @param CategoryRepositoryInterfaces $categoryRepo
     * @param NavigationHelperInterface $navHelper
     */
    public function __construct(CategoryRepositoryInterfaces $categoryRepo, NavigationHelperInterface $navHelper);

    /**
     * @param Request $request
     * @param CategoryPubShowResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, CategoryPubShowResponderInterface $responder): Response;
}
