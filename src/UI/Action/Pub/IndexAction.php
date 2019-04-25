<?php


namespace App\UI\Action\Pub;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

/**
 * Class IndexAction
 * @Route(name="index", path="/")
 */
class IndexAction
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * IndexAction constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function __invoke()
    {
        return new Response($this->twig->render('/layout/layout.html.twig'));
    }
}