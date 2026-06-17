<?php

namespace App\Http\Controllers;

use App\Jobs\IncrementProductViewsJob;

class ProductViewController extends Controller
{
    public function incrementView(int $productId)
    {
        IncrementProductViewsJob::dispatch($productId);

        return response()->json([
            'message' => 'queued',
        ]);
    }
}
