<?php


namespace App\Domain\Handler\Admin;


use App\Domain\Factory\Interfaces\PriceFactoryInterface;
use App\Domain\Handler\Interfaces\PriceCreationHandlerInterface;
use App\Domain\Repository\Interfaces\PriceRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

final class PriceCreationHandler implements PriceCreationHandlerInterface
{
    private $priceFactory;

    private $priceRepo;

    private $session;

    private $validator;

    /**
     * PriceCreationHandler constructor.
     *
     * @param PriceFactoryInterface $priceFactory
     * @param PriceRepositoryInterface $priceRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        PriceFactoryInterface $priceFactory,
        PriceRepositoryInterface $priceRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    ) {
        $this->priceFactory = $priceFactory;
        $this->priceRepo = $priceRepo;
        $this->session = $session;
        $this->validator = $validator;
    }

    public function handle(FormInterface $form): bool
    {
        if ($form->isSubmitted() && $form->isValid()) {

            $price = $this->priceFactory->create($form->get('price')->getData(), $form->get('title')->getData());

            $this->priceRepo->save($price);

            $this->session->getFlashBag()->add('success', 'Le prix à été ajouté');

            return true;
        }

        return false;
    }
}