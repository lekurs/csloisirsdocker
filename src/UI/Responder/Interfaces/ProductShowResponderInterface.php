<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface ProductShowResponderInterface
{
    /**
     * ProductShowResponderInterface constructor.
     *
     * @param Environment $tiwg
     */
    public function __construct(Environment $tiwg);

    /**
     * @param array $products
     * @param array $categories
     * @return Response
     */
    public function response(array $products, array $categories): Response;
}
