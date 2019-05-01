<?php


namespace App\UI\Responder\Admin\Parameters;


use App\Domain\Models\Area;
use App\UI\Responder\Interfaces\AreaEditResponderInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Twig\Environment;

final class AreaEditResponder implements AreaEditResponderInterface
{
    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var UrlGeneratorInterface
     */
    private $urlGenerator;

    /**
     * AreaEditResponder constructor.
     *
     * @param Environment $twig
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(Environment $twig, UrlGeneratorInterface $urlGenerator)
    {
        $this->twig = $twig;
        $this->urlGenerator = $urlGenerator;
    }

    public function response($redirect = false, FormInterface $form = null, Area $area): Response
    {
        $redirect ?
            $response = new RedirectResponse($this->urlGenerator->generate('admin')) :
            $response = new Response($this->twig->render('admin/area-edit.html.twig', [
                'form' => $form->createView(),
                'area' => $area
            ]));

        return $response;
    }
}
