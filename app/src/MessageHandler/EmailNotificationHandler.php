<?php

namespace App\MessageHandler;

use App\Message\EmailNotification;
use App\Repository\ProductRepository;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Mime\Email;

#[AsMessageHandler]
class EmailNotificationHandler
{
    private ProductRepository $productRepository;
    private MailerInterface $mailer;
    private LoggerInterface $logger;

    /**
     * @param ProductRepository $productRepository
     * @param MailerInterface $mailer
     */
    public function __construct(ProductRepository $productRepository, MailerInterface $mailer, LoggerInterface $logger)
    {
        $this->productRepository = $productRepository;
        $this->mailer = $mailer;
        $this->logger = $logger;
    }

    /**
     * @param EmailNotification $message
     * @return void
     * @throws TransportExceptionInterface
     */
    public function __invoke(EmailNotification $message): void
    {
        $this->logger->info('Processing email notification for product ID: '.$message->getProductId());

        $product = $this->productRepository->find($message->getProductId());

        if (!$product) {
            $this->logger->error('Product not found for ID: '.$message->getProductId());
            throw new \Exception('Product not found');
        }

        $email = (new Email())
            ->from('no-reply@example.com')
            ->to('user@example.com')
            ->subject('New Product Created')
            ->text('A new product named ' . $product->getName() . ' has been created.');

        $this->mailer->send($email);

        $this->logger->info('Email sent for product ID: '.$message->getProductId());
    }
}