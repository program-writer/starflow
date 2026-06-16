<?php

namespace App\Services\Contracts;

interface DeliveryGateway
{
    public function calculate(
        int $orderId
    ): float;
}
