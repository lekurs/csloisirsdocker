<?php


namespace App\UI\Responder\Message;


use App\UI\Responder\Interfaces\ReceiveContactResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

class ReceiveContactResponder implements ReceiveContactResponderInterface
{
    private $twig;

    private $urlGenerator;

    /**
     * ReceiveContactResponder constructor.
     *
     * @inheritDoc
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    /**
     * @inheritDoc
     */
    public function response($redirect = false, FormInterface $form = null, array $navigations): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('index')) :
            $response = new Response($this->twig->render('public/contact.html.twig', [
                'form' => $form->createView(),
                'navigations' => $navigations,
            ]));

        return $response;
    }
}
