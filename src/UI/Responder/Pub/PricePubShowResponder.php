<?php


namespace App\UI\Responder\Pub;


use App\UI\Responder\Interfaces\PricePubShowResponderInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class PricePubShowResponder implements PricePubShowResponderInterface
{
    private $twig;

    /**
     * PricePubShowResponder constructor.
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(array $prices): Response
    {
        return new Response($this->twig->render('public/price.html.twig', [
            'prices' => $prices
        ]));
    }
}
