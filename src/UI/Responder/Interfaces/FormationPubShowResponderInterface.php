<?php


namespace App\UI\Responder\Interfaces;


use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

interface FormationPubShowResponderInterface
{
    /**
     * FormationPubShowResponderInterface constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig);

    /**
     * @param array $formations
     * @return Response
     */
    public function response(array $formations): Response;
}
