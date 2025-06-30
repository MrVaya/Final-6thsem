<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Product;
use App\Models\HeroSection;
use App\Models\Venue;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create categories
        $categories = [
            [
                'name' => 'Fruits & Vegetables',
                'slug' => 'fruits-vegetables',
                'description' => 'Fresh fruits and vegetables',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Dairy & Eggs',
                'slug' => 'dairy-eggs',
                'description' => 'Fresh dairy products and eggs',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Meat & Poultry',
                'slug' => 'meat-poultry',
                'description' => 'Quality meat and poultry products',
                'is_active' => true,
                'sort_order' => 3
            ],
            [
                'name' => 'Bakery & Bread',
                'slug' => 'bakery-bread',
                'description' => 'Fresh baked goods and bread',
                'is_active' => true,
                'sort_order' => 4
            ],
            [
                'name' => 'Beverages',
                'slug' => 'beverages',
                'description' => 'Refreshing drinks and beverages',
                'is_active' => true,
                'sort_order' => 5
            ]
        ];

        foreach ($categories as $categoryData) {
            Category::create($categoryData);
        }

        // Create sample products
        $products = [
            [
                'name' => 'Organic Bananas',
                'description' => 'Fresh organic bananas from local farms',
                'price' => 2.99,
                'stock' => 50,
                'category_id' => 1,
                'sku' => 'ORG-BAN-001',
                'is_active' => true
            ],
            [
                'name' => 'Fresh Milk',
                'description' => 'Farm fresh whole milk',
                'price' => 4.50,
                'stock' => 30,
                'category_id' => 2,
                'sku' => 'MLK-001',
                'is_active' => true
            ],
            [
                'name' => 'Whole Wheat Bread',
                'description' => 'Healthy whole wheat sandwich bread',
                'price' => 3.25,
                'stock' => 25,
                'category_id' => 4,
                'sku' => 'BRD-WW-001',
                'is_active' => true
            ],
            [
                'name' => 'Orange Juice',
                'description' => 'Fresh squeezed orange juice',
                'price' => 5.99,
                'stock' => 20,
                'category_id' => 5,
                'sku' => 'JUC-ORA-001',
                'is_active' => true
            ],
            [
                'name' => 'Free Range Chicken',
                'description' => 'Premium free range chicken',
                'price' => 12.99,
                'stock' => 15,
                'category_id' => 3,
                'sku' => 'CHK-FR-001',
                'is_active' => true
            ]
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }

        // Create hero sections
        $heroSections = [
            [
                'title' => 'Organic Foods at your Doorsteps',
                'subtitle' => 'Fresh & Healthy',
                'description' => 'Get the finest organic foods delivered fresh to your home. Quality guaranteed.',
                'cta_text' => 'Start Shopping',
                'cta_link' => '#products',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'title' => 'Farm Fresh Vegetables',
                'subtitle' => '100% Organic',
                'description' => 'Directly from farm to your table. No pesticides, just pure nutrition.',
                'cta_text' => 'Shop Now',
                'cta_link' => '#categories',
                'is_active' => true,
                'sort_order' => 2
            ]
        ];

        foreach ($heroSections as $heroData) {
            HeroSection::create($heroData);
        }

        // Create sample venues
        $venues = [
            [
                'venuename' => 'Downtown Store',
                'location' => '123 Main Street, Downtown',
                'phone' => '+1-555-0101',
                'contact_person_name' => 'John Smith'
            ],
            [
                'venuename' => 'Suburban Branch',
                'location' => '456 Oak Avenue, Suburbs',
                'phone' => '+1-555-0102',
                'contact_person_name' => 'Sarah Johnson'
            ],
            [
                'venuename' => 'Mall Location',
                'location' => '789 Shopping Mall, City Center',
                'phone' => '+1-555-0103',
                'contact_person_name' => 'Mike Davis'
            ]
        ];

        foreach ($venues as $venueData) {
            Venue::create($venueData);
        }
    }
}
