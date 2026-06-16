<?php

namespace App\Http\Controllers;

use App\Actions\Products\GetProductAction;
use App\Actions\Products\GetProductsAction;
use App\DTO\ProductFilterDto;
use App\Http\Requests\ProductIndexRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(ProductIndexRequest $request, GetProductsAction $action) {
        $dto = new ProductFilterDto(
            categoryId: $request->integer('category_id'),
            perPage: $request->integer('per_page', 20),
            sort: $request->string('sort', 'views')->toString(),
        );

        return ProductResource::collection($action->handle($dto));
    }

    public function show(Product $product, GetProductAction $action): ProductResource
    {
        return new ProductResource($action->handle($product->id));
    }
}
