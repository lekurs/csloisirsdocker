<?php


namespace App\UI\Responder\Interfaces;


use App\Domain\Models\Area;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface AreaEditResponderInterface
{
    /**
     * AreaEditResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator);

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param Area $area
     * @return Response
     */
    public function response($redirect = false, FormInterface $form = null, Area $area): Response;
}
