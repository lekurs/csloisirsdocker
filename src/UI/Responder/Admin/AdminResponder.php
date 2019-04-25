<?php


namespace App\UI\Responder\Admin;


use App\UI\Responder\Interfaces\AdminResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class AdminResponder implements AdminResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * AdminResponder constructor.
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
    public function response(): Response
    {
        return new Response($this->twig->render('admin/admin-index.html.twig', [

        ]));
    }
}
