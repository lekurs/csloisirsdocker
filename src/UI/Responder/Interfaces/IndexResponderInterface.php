<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface IndexResponderInterface
{
    /**
     * IndexResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param array $formations
     * @param array $categories
     * @param array $nav
     * @return Response
     */
    public function response(array $formations, array $categories, array $nav): Response;
}
