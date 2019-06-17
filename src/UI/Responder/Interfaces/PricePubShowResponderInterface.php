<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface PricePubShowResponderInterface
{
    /**
     * PricePubShowResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param array $prices
     * @param array $navigations
     * @return Response
     */
    public function response(array $prices, array $navigations): Response;
}
