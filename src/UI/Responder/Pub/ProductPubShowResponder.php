<?php


namespace App\UI\Responder\Pub;


use App\Domain\Models\Product;
use App\UI\Responder\Interfaces\ProductPubShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ProductPubShowResponder implements ProductPubShowResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * ProductPubShowResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(Product $product): Response
    {
        return new Response($this->twig->render('public/product.html.twig', [
            'product' => $product
        ]));
    }
}
