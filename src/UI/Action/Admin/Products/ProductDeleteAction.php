<?php


namespace App\UI\Action\Admin\Products;


use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Action\Interfaces\ProductDeleteActionInterface;
use App\UI\Responder\Interfaces\ProductDeleteResponderInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductDeleteAction
 * @Route(name="productDelete", path="admin/product/del/{id}")
 */
final class ProductDeleteAction implements ProductDeleteActionInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * ProductDeleteAction constructor.
     *
     * @param ProductRepositoryInterface $productRepo
     */
    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, ProductDeleteResponderInterface $responder): JsonResponse
    {
        $product = $this->productRepo->getOneById($request->attributes->get('id'));

        $this->productRepo->delete($product);

        return $responder->response();
    }
}
