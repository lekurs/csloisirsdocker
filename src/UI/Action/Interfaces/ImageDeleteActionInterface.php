<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\ImageRepositoryInterface;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Responder\Interfaces\ImageDeleteResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface ImageDeleteActionInterface
{
    /**
     * ImageDeleteActionInterface constructor.
     *
     * @param ProductRepositoryInterface $productRepo
     * @param ImageRepositoryInterface $imageRepo
     * @param SessionInterface $session
     */
    public function __construct(
        ProductRepositoryInterface $productRepo,
        ImageRepositoryInterface $imageRepo,
        SessionInterface $session
    );

    /**
     * @param Request $request
     * @param ImageDeleteResponderInterface $responder
     * @return JsonResponse
     */
    public function __invoke(Request $request, ImageDeleteResponderInterface $responder): JsonResponse;
}
