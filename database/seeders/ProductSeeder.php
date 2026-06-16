<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->truncate();
        $this->import();
    }

    private function import(): void
    {
        $path = database_path('data/products.csv');
        $handle = fopen($path, 'r');
        $categories = Category::get()->pluck('title')->toArray();
        $companies = Company::get()->pluck('id')->toArray();

        while (($row = fgetcsv($handle)) !== false) {
            [$leafCategory, $title, $price] = $row;
            $categoryId = null;

            foreach ($categories as $key => $category) {
                if ($leafCategory === $category) {
                    $categoryId = ++$key;
                }
            }
            $batch[] = [
                'category_id' => $categoryId,
                'title' => $title,
                'price' => $price,
                'slug' => Str::slug($title . '-' . Str::random(5), '-'),
                'sku' => Str::random(10),
                'company_id' => rand(1, max($companies)),
                'is_published' => true,
                'is_activated' => rand(1, 10) > 2,
                'views' => rand(10, 1000),
            ];

            if (count($batch) === 5000) {
                DB::table('products')->insert($batch);
                $batch = [];
            }
        }
        fclose($handle);
    }
}
