<?php

namespace App\Message;

/**
 * Message class that will contain email information.
 */
class EmailNotification
{
    /**
     * @var int
     */
    private int $productId;

    /**
     * @param int $productId
     */
    public function __construct(int $productId)
    {
        $this->productId = $productId;
    }

    /**
     * @return int
     */
    public function getProductId(): int
    {
        return $this->productId;
    }
}