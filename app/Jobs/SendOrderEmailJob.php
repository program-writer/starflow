<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class SendOrderEmailJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public int $orderId)
    {}

    public function handle(): void
    {
        Log::info(
            'Email sent',
            [
                'order_id' => $this->orderId,
            ]
        );
    }
}
