<?php

namespace App\Services\Contracts;

interface PaymentGateway
{
    public function charge(
        int $orderId
    ): string;
}
