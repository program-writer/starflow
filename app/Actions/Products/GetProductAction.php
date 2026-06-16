<?php

namespace App\Actions\Products;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class GetProductAction
{
    public function handle(int $productId): Product
    {
        $key = "product:{$productId}";
        $cached = Cache::get($key);

        if ($cached) {
            return $cached;
        }

        return Cache::lock("lock:{$key}", 10)->block(5, function () use ($key, $productId) {
            return Cache::remember(
                $key,
                now()->addSeconds(600 + random_int(0, 120)),
                fn () => Product::query()
                    ->where('is_published', true)
                    ->findOrFail($productId)
            );
        });
    }
}
