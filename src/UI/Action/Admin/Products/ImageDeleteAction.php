<?php


namespace App\UI\Action\Admin\Products;


use App\Domain\Repository\Interfaces\ImageRepositoryInterface;
use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Action\Interfaces\ImageDeleteActionInterface;
use App\UI\Responder\Interfaces\ImageDeleteResponderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ImageDeleteAction
 * 
 * @Route(name="imageDelete", path="admin/product/image/del/{id}")
 * @IsGranted("ROLE_ADMIN")
 */
final class ImageDeleteAction implements ImageDeleteActionInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * @var ImageRepositoryInterface
     */
    private $imageRepo;

    /**
     * @var SessionInterface
     */
    private $session;

    /**
     * ImageDeleteAction constructor.
     *
     * @param ProductRepositoryInterface $productRepo
     * @param ImageRepositoryInterface $imageRepo
     * @param SessionInterface $session
     */
    public function __construct(
        ProductRepositoryInterface $productRepo,
        ImageRepositoryInterface $imageRepo,
        SessionInterface $session
    ) {
        $this->productRepo = $productRepo;
        $this->imageRepo = $imageRepo;
        $this->session = $session;
    }

    public function __invoke(Request $request, ImageDeleteResponderInterface $responder): JsonResponse
    {
        $image = $this->imageRepo->getOneById($request->attributes->get('id'));

        $this->imageRepo->removeImage($image);

        $this->session->getFlashBag()->add('success', 'Photo supprimée');

        return $responder->response();
    }
}
