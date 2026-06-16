<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('companies')->truncate();
        DB::table('companies')->insert($this->getCompanies());
    }

    private function getCompanies(): array
    {
        return $companies = [
            [
                'title' => 'Tech Solutions Inc.',
                'slug' => 'tech-solutions',
                'email' => 'contact@techsolutions.com',
                'phone' => '+1234567890',
                'address' => '123 Tech Street, Silicon Valley, CA',
                'is_verified' => true,
                'is_activated' => true,
            ],
            [
                'title' => 'Green Energy Corp',
                'slug' => 'green-energy',
                'email' => 'info@greenenergy.com',
                'phone' => '+9876543210',
                'address' => '456 Solar Way, Austin, TX',
                'is_verified' => true,
                'is_activated' => true,
            ],
            [
                'title' => 'CHANEL',
                'slug' => 'chanel-personal-shop',
                'email' => 'contact@chanel.com',
                'phone' => '+1234567890',
                'address' => '5 Barlow Place London, W1J 6DG United Kingdom',
                'is_verified' => true,
                'is_activated' => true,
            ],
            [
                'title' => 'DIOR',
                'slug' => 'dior-personal-shop',
                'email' => 'contact@dior.com',
                'phone' => '+9876543210',
                'address' => '30 Avenue Montaigne Paris, France',
                'is_verified' => true,
                'is_activated' => true,
            ],
            [
                'title' => 'Samsung',
                'slug' => 'samsung-personal-shop',
                'email' => 'contact@samsung.com',
                'phone' => '+1234567890',
                'address' => 'Suwon-si, South Korea',
                'is_verified' => true,
                'is_activated' => true,
            ],
            [
                'title' => 'Apple Inc.',
                'slug' => 'apple-personal-shop',
                'email' => 'contact@apple.com',
                'phone' => '+9876543210',
                'address' => '1 Apple Park Way, Cupertino, California, U.S.',
                'is_verified' => true,
                'is_activated' => true,
            ],
            [
                'title' => 'ADIDAS',
                'slug' => 'adidas-personal-shop',
                'email' => 'contact@adidas.com',
                'phone' => '+1234567890',
                'address' => 'Herzogenaurach, Germany',
                'is_verified' => true,
                'is_activated' => true,
            ],
            [
                'title' => 'NEW BALANCE',
                'slug' => 'new-balance-personal-shop',
                'email' => 'contact@newbalance.com',
                'phone' => '+9876543210',
                'address' => 'Boston, Massachusetts, United States',
                'is_verified' => true,
                'is_activated' => true,
            ],
        ];
    }
}
