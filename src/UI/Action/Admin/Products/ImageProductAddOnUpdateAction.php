<?php


namespace App\UI\Action\Admin\Products;

use App\Domain\Factory\Interfaces\ImageFactoryInterface;
use App\Domain\Repository\Interfaces\ImageRepositoryInterface;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Action\Interfaces\ImageProductAddOnUpdateActionInterface;
use App\UI\Responder\Interfaces\ImageProductAddOnUpdateResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ImageProductAddOnUpdateAction
 *
 * @Route(name="imageAdd", path="admin/product/image/add/product/{productId}")
 * @IsGranted("ROLE_ADMIN")
 */
final class ImageProductAddOnUpdateAction implements ImageProductAddOnUpdateActionInterface
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
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * @var string
     */
    private $dirImages;

    /**
     * @var string
     */
    private $dirImagesPath;

    /**
     * ImageProductAddOnUpdateAction constructor.
     *
     * @inheritDoc
     */
    public function __construct(
        ImageRepositoryInterface $imageRepo,
        ProductRepositoryInterface $productRepo,
        ImageFactoryInterface $imageFactory,
        SessionInterface $session,
        string $dirImages,
        string $dirImagesPath
    ) {
        $this->imageRepo = $imageRepo;
        $this->productRepo = $productRepo;
        $this->imageFactory = $imageFactory;
        $this->session = $session;
        $this->dirImages = $dirImages;
        $this->dirImagesPath = $dirImagesPath;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, ImageProductAddOnUpdateResponderInterface $responder): JsonResponse
    {
          $source = file_get_contents('php://input');
          file_put_contents($this->dirImages . $request->headers->get('x-file-name'), $source);

        $image = $this->imageFactory->create(
            $this->dirImagesPath . $request->headers->get('x-file-name'),
            $this->productRepo->getOneById($request->attributes->get('productId')),
            null, false
        );

        $product = $this->productRepo->getOneById($request->attributes->get('productId'));

        $this->imageRepo->addOne($image, $product);

        return $responder->response();
    }
}
