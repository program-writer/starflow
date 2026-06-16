<?php

namespace Integration;

use App\Jobs\CalculateShippingJob;
use App\Jobs\ChargePaymentJob;
use App\Models\Order;
use App\Services\Contracts\DeliveryGateway;
use App\Services\Contracts\PaymentGateway;
use Mockery;
use Tests\TestCase;

class QueueProcessingTest extends TestCase
{
    public function test_job_changes_order()
    {
        $order = Order::factory()->create();
        $job = new CalculateShippingJob($order->id);
        $job->handle(app(DeliveryGateway::class));
        $order->refresh();
        $this->assertGreaterThan(0, $order->shipping_cost);
    }

    public function test_payment_job_is_idempotent()
    {
        $order = Order::factory()->create(['is_paid' => true]);
        $gateway = Mockery::mock(PaymentGateway::class);
        $gateway->shouldNotReceive('charge');
        $job = new ChargePaymentJob($order->id);
        $job->handle($gateway);
        $this->assertTrue($order->fresh()->is_paid);
    }
}
