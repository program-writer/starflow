<?php

namespace Integration;

use App\Models\Product;
use Illuminate\Support\Facades\Cache;
use Tests\TestCase;

class RedisCacheTest extends TestCase
{
    public function test_stores_value()
    {
        Cache::put(
            'integration-test',
            'hello',
            60
        );
        $value = Cache::get('integration-test');
        $this->assertEquals(
            'hello',
            $value
        );
    }

    public function test_product_cache_is_invalidated()
    {
        $product = Product::factory()->create();
        Cache::put(
            "product:{$product->id}",
            $product,
            600
        );
        $product->update(['title' => 'Updated']);
        $this->assertNull(
            Cache::get(
                "product:{$product->id}"
            )
        );
    }
}
