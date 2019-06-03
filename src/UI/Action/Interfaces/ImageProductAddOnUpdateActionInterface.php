<?php


namespace App\UI\Action\Interfaces;


use App\Domain\Factory\Interfaces\ImageFactoryInterface;
use App\Domain\Repository\Interfaces\ImageRepositoryInterface;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Responder\Interfaces\ImageProductAddOnUpdateResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;

interface ImageProductAddOnUpdateActionInterface
{
    /**
     * ImageProductAddOnUpdateActionInterface constructor.
     *
     * @param ImageRepositoryInterface $imageRepo
     * @param ProductRepositoryInterface $productRepo
     * @param ImageFactoryInterface $imageFactory
     * @param SessionInterface $session
     * @param string $dirImages
     * @param string $dirImagesPath
     */
    public function __construct(
        ImageRepositoryInterface $imageRepo,
        ProductRepositoryInterface $productRepo,
        ImageFactoryInterface $imageFactory,
        SessionInterface $session,
        string $dirImages,
        string $dirImagesPath
    );

    /**
     * @param Request $request
     * @param ImageProductAddOnUpdateResponderInterface $responder
     * @return JsonResponse
     */
    public function __invoke(Request $request, ImageProductAddOnUpdateResponderInterface $responder): JsonResponse;
}
