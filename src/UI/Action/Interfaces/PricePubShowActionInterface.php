<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\PriceRepositoryInterface;
use App\Services\Interfaces\NavigationHelperInterface;
use App\UI\Responder\Interfaces\PricePubShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface PricePubShowActionInterface
{
    /**
     * PricePubShowActionInterface constructor.
     *
     * @param PriceRepositoryInterface $priceRepo
     * @param NavigationHelperInterface $navHelper
     */
    public function __construct(PriceRepositoryInterface $priceRepo, NavigationHelperInterface $navHelper);

    /**
     * @param Request $request
     * @param PricePubShowResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, PricePubShowResponderInterface $responder): Response;
}
