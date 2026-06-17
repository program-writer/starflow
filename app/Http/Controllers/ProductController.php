<?php

namespace App\Http\Controllers;

use App\Actions\Products\GetProductAction;
use App\Actions\Products\GetProductsAction;
use App\DTO\ProductFilterDto;
use App\Http\Requests\ProductIndexRequest;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(ProductIndexRequest $request, GetProductsAction $action)
    {
        $dto = new ProductFilterDto(
            categoryId: $request->integer('category_id'),
            perPage: $request->integer('per_page', 20),
            sort: $request->string('sort', 'views')->toString(),
            page: $request->integer('page', 1),
        );

        return response()->json($action->handle($dto));
    }

    public function show(int $id, GetProductAction $action): JsonResponse
    {
        return response()->json($action->handle($id));
    }
}
