<?php


namespace App\UI\Responder\Admin\Parameters;


use App\UI\Responder\Interfaces\AreaShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class AreaShowResponder implements AreaShowResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * AreaShowResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @inheritDoc
     */
    public function response(array $areas): Response
    {
        return new Response($this->twig->render('admin/area-show.html.twig', [
            'areas' => $areas,
        ]));
    }
}
