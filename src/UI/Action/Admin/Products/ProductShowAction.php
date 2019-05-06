<?php


namespace App\UI\Action\Admin\Products;


use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Action\Interfaces\ProductShowActionInterface;
use App\UI\Responder\Interfaces\ProductShowResponderInterface;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductShowAction
 * @Route(name="productShow", path="admin/products/show")
 */
class ProductShowAction implements ProductShowActionInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * ProductShowAction constructor.
     * @param ProductRepositoryInterface $productRepo
     */
    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function __invoke(ProductShowResponderInterface $responder)
    {
        $products = $this->productRepo->getAll();

//        dd($products);

        return $responder->response($products);
    }
}