<?php

namespace App\Http\Controllers;

use App\Jobs\IncrementProductViewsJob;
use App\Models\Product;

class ProductViewController extends Controller
{
    public function __invoke(Product $product)
    {
        IncrementProductViewsJob::dispatch($product->id);

        return response()->json([
            'message' => 'queued',
        ]);
    }
}
