<?php


namespace App\UI\Action\Admin\Products;


use App\Domain\Repository\Interfaces\CategoryRepositoryInterfaces;
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
     * @var CategoryRepositoryInterfaces
     */
    private $categoryRepo;

    /**
     * ProductShowAction constructor.
     * @param ProductRepositoryInterface $productRepo
     * @param CategoryRepositoryInterfaces $categoryRepo
     */
    public function __construct(ProductRepositoryInterface $productRepo, CategoryRepositoryInterfaces $categoryRepo)
    {
        $this->productRepo = $productRepo;
        $this->categoryRepo = $categoryRepo;
    }


    public function __invoke(ProductShowResponderInterface $responder)
    {
        $products = $this->productRepo->getAll();
        $categories = $this->categoryRepo->getAll();

//        dd($products);
        $productsTab = [];
        foreach ($products as  $product) {
            $productsTab[$product->getCategory()->getCategory()][] = $product;
        }

//        dd($productsTab);

        return $responder->response($productsTab, $categories);
    }
}