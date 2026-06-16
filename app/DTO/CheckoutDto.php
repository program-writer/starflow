<?php

namespace App\DTO;

readonly class CheckoutDto
{
    public function __construct(
        public string $customerEmail,
        public int $productId,
        public int $quantity,
        public string $idempotencyKey,
    ) {
    }
}
