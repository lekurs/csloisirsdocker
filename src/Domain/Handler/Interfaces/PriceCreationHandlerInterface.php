<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\PriceFactoryInterface;
use App\Domain\Repository\Interfaces\PriceRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface PriceCreationHandlerInterface
{
    /**
     * PriceCreationHandlerInterface constructor.
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
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
