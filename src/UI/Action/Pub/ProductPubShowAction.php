<?php


namespace App\UI\Action\Pub;


use App\Domain\Repository\Interfaces\ProductRepositoryInterface;
use App\Services\Interfaces\NavigationHelperInterface;
use App\UI\Action\Interfaces\ProductPubShowActionInterface;
use App\UI\Responder\Interfaces\ProductPubShowResponderInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ProductPubShowAction
 * @Route(name="showProductPub", path="/{category}/{slug}")
 */
final class ProductPubShowAction implements ProductPubShowActionInterface
{
    /**
     * @var ProductRepositoryInterface
     */
    private $productRepo;

    private $navHelper;

    /**
     * ProductPubShowAction constructor.
     * @param ProductRepositoryInterface $productRepo
     * @param $navHelper
     */
    public function __construct(ProductRepositoryInterface $productRepo, NavigationHelperInterface $navHelper)
    {
        $this->productRepo = $productRepo;
        $this->navHelper = $navHelper;
    }

    public function __invoke(Request $request, ProductPubShowResponderInterface $responder): Response
    {
        $product = $this->productRepo->getOneBySlug($request->attributes->get('slug'));

        $navigations = $this->navHelper->showNav();

        return $responder->response($product, $navigations);
    }
}
