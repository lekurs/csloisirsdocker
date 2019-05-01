<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\AreaRepositoryInterface;
use App\UI\Responder\Interfaces\AreaShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

interface AreaShowActionInterface
{
    /**
     * AreaShowActionInterface constructor.
     *
     * @param AreaRepositoryInterface $areaRepo
     */
    public function __construct(AreaRepositoryInterface $areaRepo);

    /**
     * @param Request $request
     * @param AreaShowResponderInterface $responder
     * @return Response
     */
    public function __invoke(Request $request, AreaShowResponderInterface $responder): Response;
}
