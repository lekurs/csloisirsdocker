<?php


namespace App\UI\Responder\Pub;


use App\UI\Responder\Interfaces\IndexResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class IndexResponder implements IndexResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * IndexResponder constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @inheritDoc
     */
    public function response(array $formations, array $categories): Response
    {
        return new Response($this->twig->render('public/home.html.twig', [
            'formations' => $formations,
            'categories' => $categories
        ]));
    }
}
