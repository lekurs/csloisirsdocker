<?php


namespace App\UI\Action\Admin\Products;


use App\Domain\Factory\Interfaces\ImageFactoryInterface;
use App\Domain\Repository\Interfaces\ImageRepositoryInterface;
use App\UI\Action\Interfaces\ImageProductAddOnUpdateActionInterface;
use App\UI\Responder\Interfaces\ImageProductAddOnUpdateResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ImageProductAddOnUpdateAction
 * @Route(name="imageAdd", path="admin/product/image/add")
 */
class ImageProductAddOnUpdateAction implements ImageProductAddOnUpdateActionInterface
{
    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepo;

    /**
     * @var ImageFactoryInterface
     */
    private $imageFactory;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var string
     */
    private $dirImages;

    /**
     * ImageProductAddOnUpdateAction constructor.
     * @param ImageRepositoryInterface $imageRepo
     * @param ImageFactoryInterface $imageFactory
     * @param SessionInterface $session
     * @param string $dirImages
     */
    public function __construct(ImageRepositoryInterface $imageRepo, ImageFactoryInterface $imageFactory, SessionInterface $session, string $dirImages)
    {
        $this->imageRepo = $imageRepo;
        $this->imageFactory = $imageFactory;
        $this->session = $session;
        $this->dirImages = $dirImages;
    }

    public function __invoke(Request $request, ImageProductAddOnUpdateResponderInterface $responder): JsonResponse
    {
          $source = file_get_contents('php://input');
          file_put_contents($this->dirImages . $request->headers->get('x-file-name'), $source);

        return $responder->response();
    }
}