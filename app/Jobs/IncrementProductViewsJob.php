<?php

namespace App\Jobs;

use App\Models\Product;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;

class IncrementProductViewsJob implements ShouldQueue
{
    use Queueable;

    public function __construct(public int $productId)
    {}

    public function handle(): void
    {
        $product = Product::findOrFail($this->productId);
        $product->update(['views' => ++$product->views]);
    }
}
