<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\Services\Interfaces\NavigationHelperInterface;
use App\UI\Responder\Interfaces\ProductPubShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface ProductPubShowActionInterface
{
    /**
     * ProductPubShowActionInterface constructor.
     *
     * @param ProductRepositoryInterface $productRepo
     * @param NavigationHelperInterface $navHelper
     */
    public function __construct(ProductRepositoryInterface $productRepo, NavigationHelperInterface $navHelper);

    /**
     * @param Request $request
     * @param ProductPubShowResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, ProductPubShowResponderInterface $responder): Response;
}
