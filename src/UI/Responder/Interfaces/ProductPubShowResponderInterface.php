<?php


namespace App\UI\Responder\Interfaces;


use App\Domain\Models\Product;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface ProductPubShowResponderInterface
{
    /**
     * ProductPubShowResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param Product $product
     * @param array $navigations
     * @return Response
     */
    public function response(Product $product, array $navigations): Response;
}
