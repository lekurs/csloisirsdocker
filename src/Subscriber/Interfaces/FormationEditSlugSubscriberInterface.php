<?php


namespace App\Subscriber\Interfaces;


use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormEvent;

interface FormationEditSlugSubscriberInterface
{
    /**
     * FormationEditSlugSubscriberInterface constructor.
     *
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(SlugHelperInterface $slugHelper);

    /**
     * @param FormEvent $event
     * @return mixed
     */
    public function onSubmit(FormEvent $event);
}
