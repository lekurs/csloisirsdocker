<?php


namespace App\UI\Action\Message;


use App\Domain\Form\Message\ReceiveNewContactForm;
use App\Domain\Handler\Interfaces\ReceiveContactFormHandlerInterface;
use App\Services\Interfaces\NavigationHelperInterface;
use App\UI\Action\Interfaces\ReceiveContactActionInterface;
use App\UI\Responder\Interfaces\ReceiveContactResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class ReceiveContactAction
 * @Route(name="receiveContact", path="/contact")
 */
final class ReceiveContactAction implements ReceiveContactActionInterface
{
    private $formFactory;

    private $receiveContactFormHandler;

    private $navHelper;

    /**
     * ReceiveContactAction constructor.
     * @param FormFactoryInterface $formFactory
     * @param ReceiveContactFormHandlerInterface $receiveContactFormHandler
     * @param $navHelper
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        ReceiveContactFormHandlerInterface $receiveContactFormHandler,
        NavigationHelperInterface $navHelper
    ) {
        $this->formFactory = $formFactory;
        $this->receiveContactFormHandler = $receiveContactFormHandler;
        $this->navHelper = $navHelper;
    }

    public function __invoke(Request $request, ReceiveContactResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(ReceiveNewContactForm::class)->handleRequest($request);

        $navigations = $this->navHelper->showNav();

        if ($this->receiveContactFormHandler->handle($form)) {

            return $responder->response(true, null, $navigations);
        }

        return $responder->response(false, $form, $navigations);
    }
}