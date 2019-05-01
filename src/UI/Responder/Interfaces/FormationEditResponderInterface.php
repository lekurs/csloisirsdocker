<?php


namespace App\UI\Responder\Interfaces;


use App\Domain\Models\Formation;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

interface FormationEditResponderInterface
{
    /**
     * FormationEditResponderInterface constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator);

    /**
     * @param bool $redirect
     * @param FormInterface|null $form
     * @param Formation $formation
     * @return Response
     */
    public function response($redirect = false, FormInterface $form = null, Formation $formation): Response;
}
