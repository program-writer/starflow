<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        echo 'Seeding started, please wait...' . PHP_EOL . PHP_EOL;
        $this->call(CompanySeeder::class);
        $this->call(PeopleSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        echo 'All seeders finished successfully!' . PHP_EOL;
    }
}
