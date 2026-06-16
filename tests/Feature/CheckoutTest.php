<?php

namespace Feature;

use App\Jobs\CalculateShippingJob;
use App\Jobs\ChargePaymentJob;
use App\Models\Product;
use Illuminate\Support\Facades\Queue;
use Tests\TestCase;

class CheckoutTest extends TestCase
{
    public function test_dispatches_jobs()
    {
        Queue::fake();
        $product = Product::factory()
                ->create();
        $this->postJson(
            '/api/checkout',
            [
                'customer_email' => 'test@test.com',
                'product_id' => $product->id,
                'quantity' => 2,
            ]
        )->assertCreated();
        Queue::assertPushed(ChargePaymentJob::class);
        Queue::assertPushed(CalculateShippingJob::class);
    }
}
