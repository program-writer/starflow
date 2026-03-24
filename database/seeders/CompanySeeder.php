<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->truncate();

        $companies = [
            [
                'title' => 'Tech Solutions Inc.',
                'image' => 'prepared_companies_images/1.png',
                'slug' => 'tech-solutions',
                'description' => 'A leading provider of innovative tech solutions.',
                'email' => 'contact@techsolutions.com',
                'phone' => '+1234567890',
                'business_address' => '123 Tech Street, Silicon Valley, CA',
                'country_id' => 1,
                'is_verified' => true,
                'is_activated' => true,
                'has_custom_design' => false,
                'rating' => '4.5 (Основан на 1000+ отзывах)',
                'cashback_level' => '3%',
            ],
            [
                'title' => 'Green Energy Corp',
                'image' => 'prepared_companies_images/2.png',
                'slug' => 'green-energy',
                'description' => 'Pioneering renewable energy solutions worldwide.',
                'email' => 'info@greenenergy.com',
                'phone' => '+9876543210',
                'business_address' => '456 Solar Way, Austin, TX',
                'country_id' => 2,
                'is_verified' => true,
                'is_activated' => true,
                'has_custom_design' => false,
                'rating' => '4.5 (Основан на 1000+ отзывах)',
                'cashback_level' => '3%',
            ],

            //Personal Shops
            [
                'title' => 'CHANEL',
                'image' => 'prepared_companies_images/chanel.png',
                'slug' => 'chanel-personal-shop',
                'description' => 'The CHANEL Culture Fund is a global programme of unique initiatives and partnerships that will support cultural innovators in advancing new ideas and greater representation in culture and society. The Fund seeks to champion equality of voice and give visibility to global gamechangers at a time when the arts provide a vital source of inspiration and shifting perspectives on the way we view the world.',
                'email' => 'contact@chanel.com',
                'phone' => '+1234567890',
                'business_address' => '5 Barlow Place London, W1J 6DG United Kingdom',
                'country_id' => 1,
                'is_verified' => true,
                'is_activated' => true,
                'has_custom_design' => true,
                'rating' => '5 (Основан на 1000+ отзывах)',
                'cashback_level' => '40%',
            ],
            [
                'title' => 'DIOR',
                'image' => 'prepared_companies_images/dior.png',
                'slug' => 'dior-personal-shop',
                'description' => 'The DIOR Fund is a global programme of unique initiatives and partnerships that will support cultural innovators in advancing new ideas and greater representation in culture and society. The Fund seeks to champion equality of voice and give visibility to global gamechangers at a time when the arts provide a vital source of inspiration and shifting perspectives on the way we view the world.',
                'email' => 'contact@dior.com',
                'phone' => '+9876543210',
                'business_address' => '30 Avenue Montaigne Paris, France',
                'country_id' => 1,
                'is_verified' => true,
                'is_activated' => true,
                'has_custom_design' => true,
                'rating' => '5 (Основан на 1000+ отзывах)',
                'cashback_level' => '40%',
            ],
            [
                'title' => 'Samsung',
                'image' => 'prepared_companies_images/samsung.png',
                'slug' => 'samsung-personal-shop',
                'description' => 'Samsung Electronics constantly reinvents the future. We explore the unknown to discover technologies to help people all over the world lead happier, healthier lives.',
                'email' => 'contact@samsung.com',
                'phone' => '+1234567890',
                'business_address' => 'Suwon-si, South Korea',
                'country_id' => 1,
                'is_verified' => true,
                'is_activated' => true,
                'has_custom_design' => true,
                'rating' => '5 (Основан на 1000+ отзывах)',
                'cashback_level' => '40%',
            ],
            [
                'title' => 'Apple Inc.',
                'image' => 'prepared_companies_images/apple.png',
                'slug' => 'apple-personal-shop',
                'description' => 'Apple Inc. is an American multinational corporation and technology company headquartered in Cupertino, California, in Silicon Valley. It is best known for its consumer electronics, software, and services.',
                'email' => 'contact@apple.com',
                'phone' => '+9876543210',
                'business_address' => '1 Apple Park Way, Cupertino, California, U.S.',
                'country_id' => 1,
                'is_verified' => true,
                'is_activated' => true,
                'has_custom_design' => true,
                'rating' => '5 (Основан на 1000+ отзывах)',
                'cashback_level' => '40%',
            ],
            [
                'title' => 'ADIDAS',
                'image' => 'prepared_companies_images/adidas.png',
                'slug' => 'adidas-personal-shop',
                'description' => 'Everything we do is rooted in sport. Sport plays an increasingly important role in more and more people’s lives, on and off the field of play. It is central to every culture and society, and is core to our health and happiness.',
                'email' => 'contact@adidas.com',
                'phone' => '+1234567890',
                'business_address' => 'Herzogenaurach, Germany',
                'country_id' => 1,
                'is_verified' => true,
                'is_activated' => true,
                'has_custom_design' => true,
                'rating' => '5 (Основан на 1000+ отзывах)',
                'cashback_level' => '40%',
            ],
            [
                'title' => 'NEW BALANCE',
                'image' => 'prepared_companies_images/new-balance.png',
                'slug' => 'new-balance-personal-shop',
                'description' => 'Our purpose captures what our brand stands for, reflects our long-standing values, and is woven into every aspect of our company. We strive to unite people through sport and its principles of respect and fair play. We believe we can help shape the future of sport and culture in which all voices are welcome and heard. We are committed to creating positive change by lifting communities through access and opportunity to healthy, active living and education. Every person associated with New Balance — including our associates, athletes, ambassadors, and partners — has a responsibility to embrace, endorse, and amplify our purpose.',
                'email' => 'contact@newbalance.com',
                'phone' => '+9876543210',
                'business_address' => 'Boston, Massachusetts, United States',
                'country_id' => 1,
                'is_verified' => true,
                'is_activated' => true,
                'has_custom_design' => true,
                'rating' => '5 (Основан на 1000+ отзывах)',
                'cashback_level' => '40%',
            ],
        ];

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
