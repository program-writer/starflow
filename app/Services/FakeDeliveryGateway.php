<?php

namespace App\Services;

use App\Services\Contracts\DeliveryGateway;

class FakeDeliveryGateway implements DeliveryGateway
{
    public function calculate(int $orderId): float
    {
        return random_int(500, 5000);
    }
}
