<?php


namespace App\UI\Action\Pub;


use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\UI\Action\Interfaces\ProductPubShowActionInterface;
use App\UI\Responder\Interfaces\ProductPubShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductPubShowAction
 * @Route(name="showProductPub", path="/{category}/{slug}")
 */
class ProductPubShowAction implements ProductPubShowActionInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    /**
     * ProductPubShowAction constructor.
     * @param ProductRepositoryInterface $productRepo
     */
    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->productRepo = $productRepo;
    }

    public function __invoke(Request $request, ProductPubShowResponderInterface $responder): Response
    {
        $product = $this->productRepo->getOneBySlug($request->attributes->get('slug'));

        return $responder->response($product);
    }
}