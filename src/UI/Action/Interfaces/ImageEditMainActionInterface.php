<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Repository\Interfaces\ImageRepositoryInterface;
use App\UI\Responder\Interfaces\ImageEditMainResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface ImageEditMainActionInterface
{
    /**
     * ImageEditMainActionInterface constructor.
     *
     * @param ImageRepositoryInterface $imageRepo
     * @param SessionInterface $session
     */
    public function __construct(ImageRepositoryInterface $imageRepo, SessionInterface $session);

    /**
     * @param Request $request
     * @param ImageEditMainResponderInterface $responder
     * @return JsonResponse
     */
    public function __invoke(Request $request, ImageEditMainResponderInterface $responder): JsonResponse;
}
