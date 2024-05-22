<?php

namespace App\EventListener;

use App\Entity\Product;
use App\Message\EmailNotification;
use Doctrine\Persistence\Event\LifecycleEventArgs;
use Symfony\Component\Messenger\MessageBusInterface;

/**
 * Send a message when a product is created
 * Doctrine event listener class
 */
class ProductCreationListener
{
    /**
     * @var MessageBusInterface
     */
    private MessageBusInterface $messageBus;

    /**
     * @param MessageBusInterface $messageBus
     */
    public function __construct(MessageBusInterface $messageBus)
    {
        $this->messageBus = $messageBus;
    }

    /**
     * @param LifecycleEventArgs $event
     * @return void
     */
    public function postPersist(LifecycleEventArgs $event): void
    {
        $product = $event->getObject();
        $this->messageBus->dispatch(new EmailNotification($product->getId()));
    }
}