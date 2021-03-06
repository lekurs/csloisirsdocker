<?php


namespace App\UI\Responder\Admin\Products;


use App\UI\Responder\Interfaces\ProductCreationResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class ProductCreationResponder implements ProductCreationResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * ProductCreationResponder constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @inheritDoc
     */
    public function response($redirect = false, FormInterface $form = null): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('admin')) :
            $response = new Response($this->twig->render('admin/product-creation.html.twig', [
                'form' => $form->createView(),
            ]));

        return $response;
    }
}
