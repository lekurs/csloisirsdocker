<?php


namespace App\UI\Responder\Admin\Products;


use App\UI\Responder\Interfaces\ProductShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class ProductShowResponder implements ProductShowResponderInterface
{
    /**
     * @var Environment
     */
    private $tiwg;

    /**
     * ProductShowResponder constructor.
     * @param Environment $tiwg
     */
    public function __construct(Environment $tiwg)
    {
        $this->tiwg = $tiwg;
    }

    public function response(array $products, array $categories): Response
    {
        return new Response($this->tiwg->render('admin/product-show.html.twig', [
            'products' => $products,
            'categories' => $categories
        ]));
    }
}