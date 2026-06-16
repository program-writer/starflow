<?php

namespace Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductsIndexTest extends TestCase
{
    use RefreshDatabase;

    public function test_returns_products()
    {
        Product::factory()
            ->count(5)
            ->create();
        $response = $this->getJson('/api/products');
        $response
            ->assertOk()
            ->assertJsonStructure(['data']);
    }
}
