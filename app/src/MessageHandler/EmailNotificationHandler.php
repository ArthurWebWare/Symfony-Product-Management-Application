<?php

namespace App\MessageHandler;

use App\Entity\Product;
use App\Message\EmailNotification;
use App\Repository\ProductRepository;
use Exception;
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
     * @param LoggerInterface $logger
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
     * @throws TransportExceptionInterface|Exception
     */
    public function __invoke(EmailNotification $message): void
    {
        $productId = $message->getProductId();

        $this->logger->info('Processing email notification for product ID: ' . $productId);

        $product = $this->productRepository->find($productId);

        if (!$product) {
            $this->logger->error('Product not found for ID: ' . $productId);
            throw new Exception('Product not found');
        }

        $this->sendEmail($product);

        $this->logger->info('Email sent for product ID: ' . $productId);
    }

    /**
     * @param Product $product
     * @return void
     * @throws TransportExceptionInterface
     */
    private function sendEmail(Product $product): void
    {
        $subject = 'New Product Created';
        $content = 'A new product named ' . $product->getName() . ' with ID: ' . $product->getId() . ' has been created.';

        $this->mailer->send(
            (new Email())
                ->from($_ENV['MAILER_APP_ADDR'])
                ->to($_ENV['MAILER_ADMIN_ADDR'])
                ->subject($subject)
                ->text($content)
        );
    }
}