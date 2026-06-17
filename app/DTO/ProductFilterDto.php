<?php

namespace App\DTO;

readonly class ProductFilterDto
{
    public function __construct(
        public ?int $categoryId,
        public int $perPage,
        public string $sort,
        public int $page,
    ) {}
}
