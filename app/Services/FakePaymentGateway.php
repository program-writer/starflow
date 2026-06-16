<?php

namespace App\Services;

use App\Services\Contracts\PaymentGateway;
use Illuminate\Support\Str;
use RuntimeException;

class FakePaymentGateway implements PaymentGateway
{
    public function charge(int $orderId): string
    {
        if (random_int(1, 100) <= 20) {
            throw new RuntimeException(
                'Payment provider unavailable'
            );
        }

        return Str::uuid();
    }
}
