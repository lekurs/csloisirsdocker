<?php


namespace App\Domain\Handler\Interfaces;


use App\Domain\Factory\Interfaces\AreaFactoryInterface;
use App\Domain\Repository\Interfaces\AreaRepositoryInterface;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

interface AreaCreationFormHandlerInterface
{
    /**
     * AreaCreationFormHandlerInterface constructor.
     *
     * @param AreaFactoryInterface $areaFactory
     * @param AreaRepositoryInterface $areaRepo
     * @param SessionInterface $session
     * @param ValidatorInterface $validator
     */
    public function __construct(
        AreaFactoryInterface $areaFactory,
        AreaRepositoryInterface $areaRepo,
        SessionInterface $session,
        ValidatorInterface $validator
    );

    /**
     * @param FormInterface $form
     * @return bool
     */
    public function handle(FormInterface $form): bool;
}
