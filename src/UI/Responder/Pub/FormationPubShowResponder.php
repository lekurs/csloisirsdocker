<?php


namespace App\UI\Responder\Pub;


use App\UI\Responder\Interfaces\FormationPubShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class FormationPubShowResponder implements FormationPubShowResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * FormationPubShowResponder constructor.
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
    public function response(array $formations, array $navigations): Response
    {
        return new Response($this->twig->render('public/formations.html.twig', [
            'formations' => $formations,
            'navigations' => $navigations
        ]));
    }
}
