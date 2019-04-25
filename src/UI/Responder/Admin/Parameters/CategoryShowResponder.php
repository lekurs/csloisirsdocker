<?php


namespace App\UI\Responder\Admin\Parameters;


use App\UI\Responder\Interfaces\CategoryShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class CategoryShowResponder implements CategoryShowResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * CategoryShowResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(array $categories): Response
    {
        return new Response($this->twig->render('admin/category-show.html.twig', [
            'categories' => $categories,
        ]));
    }
}