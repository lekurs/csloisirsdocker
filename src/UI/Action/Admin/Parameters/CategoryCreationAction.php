<?php


namespace App\UI\Action\Admin\Parameters;


use App\Domain\Form\CategoryCreationForm;
use App\Domain\Handler\Interfaces\CategoryCreationFormHandlerInterface;
use App\UI\Action\Interfaces\CategoryCreationActionInterface;
use App\UI\Responder\Interfaces\CategoryCreationResponderInterface;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class CategoryCreationAction
 * @Route(name="categoryAdd", path="admin/category/add")
 */
class CategoryCreationAction implements CategoryCreationActionInterface
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var CategoryCreationFormHandlerInterface
     */
    private $categoryCreationHandler;

    /**
     * CategoryCreationAction constructor.
     *
     * @param FormFactoryInterface $formFactory
     * @param CategoryCreationFormHandlerInterface $categoryCreationHandler
     */
    public function __construct(
        FormFactoryInterface $formFactory,
        CategoryCreationFormHandlerInterface $categoryCreationHandler
    ) {
        $this->formFactory = $formFactory;
        $this->categoryCreationHandler = $categoryCreationHandler;
    }

    /**
     * @inheritDoc
     */
    public function __invoke(Request $request, CategoryCreationResponderInterface $responder): Response
    {
        $form = $this->formFactory->create(CategoryCreationForm::class)->handleRequest($request);

        if ($this->categoryCreationHandler->handle($form)) {

            return $responder->response(true, null);
        }

        return $responder->response(false, $form);
    }
}
