<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->truncate();
        $categories = require database_path('data/categories.php');
        $this->createCategories($categories);
    }

    private function createCategories(array $categories, ?int $parentId = null): void
    {
        foreach ($categories as $key => $value) {
            if (is_array($value)) {
                $category = Category::create([
                    'title' => $key,
                    'slug' => Str::slug($key . '-' . Str::random(5), '-'),
                    'parent_id' => $parentId,
                ]);
                $this->createCategories(
                    $value,
                    $category->id
                );
            } else {
                Category::create([
                    'title' => $value,
                    'slug' => Str::slug($value . '-' . Str::random(5), '-'),
                    'parent_id' => $parentId,
                ]);
            }
        }
    }
}
