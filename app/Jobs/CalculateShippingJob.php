<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\Contracts\DeliveryGateway;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class CalculateShippingJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public int $orderId)
    {}

    public function handle(DeliveryGateway $gateway): void
    {
        $order = Order::findOrFail($this->orderId);
        $shipping = $gateway->calculate($order->id);
        $order->update(['shipping_cost' => $shipping]);
    }
}
