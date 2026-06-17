<?php

namespace App\Jobs;

use App\Models\Order;
use App\Services\Contracts\PaymentGateway;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class ChargePaymentJob implements ShouldQueue
{
    use Queueable;
    public int $tries = 3;

    public function __construct(public int $orderId) {}

    public function backoff(): array
    {
        return [10, 30, 60];
    }

    public function handle(PaymentGateway $gateway): void
    {
        $order = Order::findOrFail($this->orderId);

        if ($order->is_paid) {
            return;
        }
        $transactionId = $gateway->charge($order->id);
        $order->update([
            'is_paid' => true,
            'status' => 'paid',
            'payment_transaction_id' => $transactionId,
        ]);
        SendOrderEmailJob::dispatch($order->id)->onQueue('emails');
    }

    public function failed(\Exception $exception)
    {
        Order::query()->whereKey($this->orderId)
            ->update(['status' => 'payment_failed']);
    }
}
