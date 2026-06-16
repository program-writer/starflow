<?php

namespace Tests\Unit;

use App\Jobs\ChargePaymentJob;
use App\Models\Order;
use App\Services\Contracts\PaymentGateway;
use Mockery;
use Tests\TestCase;

class ChargePaymentJobTest extends TestCase
{
    public function test_payment_is_processed(): void
    {
        $order = Order::factory()->create(['is_paid' => false]);
        $gateway = Mockery::mock(PaymentGateway::class);
        $gateway->shouldReceive('charge')
                ->once()
                ->andReturn('tx-123');
        $job = new ChargePaymentJob($order->id);
        $job->handle($gateway);
        $order->refresh();
        $this->assertTrue($order->is_paid);
    }
}
