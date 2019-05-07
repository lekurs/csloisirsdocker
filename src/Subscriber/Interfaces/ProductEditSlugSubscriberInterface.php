<?php


namespace App\Subscriber\Interfaces;


use App\Services\Interfaces\SlugHelperInterface;
use Symfony\Component\Form\FormEvent;

interface ProductEditSlugSubscriberInterface
{
    /**
     * ProductEditSlugSubscriberInterface constructor.
     *
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(SlugHelperInterface $slugHelper);

    /**
     * @param FormEvent $event
     * @return mixed
     */
    public function editOnSubmit(FormEvent $event);
}
