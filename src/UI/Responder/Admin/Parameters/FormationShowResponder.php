<?php


namespace App\UI\Responder\Admin\Parameters;


use App\UI\Responder\Interfaces\FormationShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class FormationShowResponder implements FormationShowResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * FormationShowResponder constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(array $formations): Response
    {
        return new Response($this->twig->render('admin/formation-show.html.twig', [
            'formations' => $formations,
        ]));
    }
}
