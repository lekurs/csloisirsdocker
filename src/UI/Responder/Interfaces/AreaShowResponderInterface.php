<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface AreaShowResponderInterface
{
    /**
     * AreaShowResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param array $areas
     * @return Response
     */
    public function response(array $areas): Response;
}
