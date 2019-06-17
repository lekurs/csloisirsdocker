<?php


namespace App\UI\Responder\Security;


use App\UI\Responder\Interfaces\AdministratorResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

final class AdministratorResponder implements AdministratorResponderInterface
{
    private $twig;

    /**
     * AdministratorResponder constructor.
     *
     * @param $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    public function response(FormInterface $form): Response
    {
        return new Response($this->twig->render('Security/administrator.html.twig', [
            'form' => $form->createView(),
        ]));
    }

}