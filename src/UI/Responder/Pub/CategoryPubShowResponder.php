<?php


namespace App\UI\Responder\Pub;


use App\Domain\Models\Category;
use App\UI\Responder\Interfaces\CategoryPubShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class CategoryPubShowResponder implements CategoryPubShowResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * CategoryPubShowResponder constructor.
     *
     * @inheritDoc
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @inheritDoc
     */
    public function response(Category $category): Response
    {
        return new Response($this->twig->render('public/products-category.html.twig', [
            'category' => $category,
        ]));
    }
}
