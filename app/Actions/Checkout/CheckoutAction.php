<?php

namespace App\Actions\Checkout;

use App\DTO\CheckoutDto;
use App\Jobs\CalculateShippingJob;
use App\Jobs\ChargePaymentJob;
use App\Models\Order;
use App\Models\Product;

class CheckoutAction
{
    public function handle(CheckoutDto $dto): Order
    {
        $product = Product::query()->findOrFail($dto->productId);
        $order = Order::create([
                    'customer_email' => $dto->customerEmail,
                    'amount' => $product->price * $dto->quantity,
                    'status' => 'pending',
                    'idempotency_key' => $dto->idempotencyKey,
                ]);
        ChargePaymentJob::dispatch($order->id)->onQueue('payments');
        CalculateShippingJob::dispatch($order->id)->onQueue('shipping');

        return $order;
    }
}
