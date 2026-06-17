<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\Contracts\DeliveryGateway;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CalculateShippingJob implements ShouldQueue
{
    use Queueable;

    public int $tries = 3;

    public function __construct(public int $orderId) {}

    public function backoff(): array
    {
        return [10, 30, 60];
    }

    public function handle(DeliveryGateway $gateway): void
    {
        $order = Order::findOrFail($this->orderId);
        $shipping = $gateway->calculate($order->id);
        $order->update(['shipping_cost' => $shipping]);
    }
}
