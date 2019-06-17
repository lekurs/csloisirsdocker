<?php


namespace App\UI\Action\Security;


use App\Domain\Form\Security\LoginForm;
use App\UI\Action\Interfaces\AdministratorActionInterface;
use App\UI\Responder\Interfaces\AdministratorResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class AdministratorAction
 *
 * @Route(name="administrator", path="/administrator")
 */
final class AdministratorAction implements AdministratorActionInterface
{
    private $formFactory;

    /**
     * AdministratorAction constructor.
     * @param $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function __invoke(Request $request, AdministratorResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(LoginForm::class)->handleRequest($request);

        return $responder->response($form);
    }
}