<?php


namespace App\Subscriber;


use App\Services\Interfaces\SlugHelperInterface;
use App\Subscriber\Interfaces\ProductEditSlugSubscriberInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;

class ProductEditSlugSubscriber implements EventSubscriberInterface, ProductEditSlugSubscriberInterface
{
    /**
     * @var SlugHelperInterface
     */
    private $slugHelper;

    /**
     * ProductEditSlugSubscriber constructor.
     * @param SlugHelperInterface $slugHelper
     */
    public function __construct(SlugHelperInterface $slugHelper)
    {
        $this->slugHelper = $slugHelper;
    }

    public static function getSubscribedEvents()
    {
        return [
           FormEvents::SUBMIT => 'editOnSubmit'
        ];
    }

    public function editOnSubmit(FormEvent $event)
    {
        $event->getData()->slug = $this->slugHelper->replace($event->getData()->title);
    }
}