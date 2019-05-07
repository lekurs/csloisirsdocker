<?php


namespace App\UI\Responder\Admin\Products;


use App\Domain\Models\Product;
use App\UI\Responder\Interfaces\ProductEditResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class ProductEditResponder implements ProductEditResponderInterface
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
     * ProductEditResponder constructor.
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
    public function response($redirect = false, FormInterface $form = null, Product $product): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('productShow')) :
            $response = new Response($this->twig->render('admin/product-edit.html.twig', [
                'form' => $form->createView(),
                'product' => $product
            ]));

        return $response;
    }
}
