<?php

namespace App\Actions\Products;

use App\DTO\ProductFilterDto;
use App\Models\Product;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Cache;

class GetProductsAction
{
    public function handle(ProductFilterDto $dto): LengthAwarePaginator
    {
        $key = sprintf(
            'products:list:%s:%s:%s',
            $dto->categoryId,
            $dto->sort,
            $dto->perPage
        );

        return Cache::remember(
            $key,
            now()->addSeconds(300 + random_int(0, 60)),
            function () use ($dto) {
                return Product::query()
                        ->when(
                            $dto->categoryId,
                            fn ($query) => $query->where(
                                'category_id',
                                $dto->categoryId
                            )
                        )
                        ->where('is_published', true)
                        ->where('is_activated', true)
                        ->orderByDesc($dto->sort)
                        ->paginate($dto->perPage);
            }
        );
    }
}
