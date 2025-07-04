<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Tournament;
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
        // Create tournaments for Futsal
        $tournaments = [
            [
                'name' => 'Premier Futsal League',
                'slug' => 'premier-futsal-league',
                'description' => 'Top-level futsal tournament',
                'is_active' => true,
                'sort_order' => 1
            ],
            [
                'name' => 'Elite Cup',
                'slug' => 'elite-cup',
                'description' => 'Elite teams compete for the cup',
                'is_active' => true,
                'sort_order' => 2
            ],
            [
                'name' => 'Community Challenge',
                'slug' => 'community-challenge',
                'description' => 'Open tournament for all community teams',
                'is_active' => true,
                'sort_order' => 3
            ]
        ];

        foreach ($tournaments as $tournamentData) {
            Tournament::create($tournamentData);
        }

        // Create futsal equipment products
        $products = [
            [
                'name' => 'Professional Futsal Ball',
                'description' => 'FIFA approved futsal ball with excellent grip and durability',
                'price' => 45.99,
                'stock' => 25,
                'tournament_id' => 1,
                'sku' => 'BALL-PRO-001',
                'is_active' => true
            ],
            [
                'name' => 'Indoor Court Shoes',
                'description' => 'High-performance futsal shoes with non-marking sole',
                'price' => 89.99,
                'stock' => 30,
                'tournament_id' => 2,
                'sku' => 'SHOE-IND-001',
                'is_active' => true
            ],
            [
                'name' => 'Team Jersey Set',
                'description' => 'Professional team jerseys - set of 12',
                'price' => 299.99,
                'stock' => 15,
                'tournament_id' => 3,
                'sku' => 'JER-TEAM-001',
                'is_active' => true
            ],
            [
                'name' => 'Training Cone Set',
                'description' => 'Set of 20 training cones for drills and practice',
                'price' => 29.99,
                'stock' => 40,
                'tournament_id' => 1,
                'sku' => 'CONE-TRN-001',
                'is_active' => true
            ],
            [
                'name' => 'Sports Water Bottle',
                'description' => 'Insulated water bottle for players',
                'price' => 15.99,
                'stock' => 50,
                'tournament_id' => 2,
                'sku' => 'BOT-SPT-001',
                'is_active' => true
            ]
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }

        // Create hero sections for Futsal
        $heroSections = [
            [
                'title' => 'FUTBOOK',
                'subtitle' => 'One step away from booking futsal',
                'description' => 'Book your futsal court easily and quickly with FUTBOOK!',
                'background_image' => asset('frontend-assets/images/futsal1.jpg'),
                'cta_text' => 'Book Now',
                'cta_link' => '#booking',
                'is_active' => true,
                'sort_order' => 1,
            ],
        ];

        foreach ($heroSections as $heroData) {
            \App\Models\HeroSection::create($heroData);
        }

        // Create futsal courts (venues)
        $venues = [
            [
                'venuename' => 'Premier Futsal Court A',
                'location' => 'Sports Complex, Downtown Arena, Floor 1',
                'phone' => '+1-555-FUTSAL',
                'contact_person_name' => 'Carlos Rodriguez'
            ],
            [
                'venuename' => 'Elite Training Court B',
                'location' => 'Athletic Center, West Wing, Court 2',
                'phone' => '+1-555-ELITE',
                'contact_person_name' => 'Maria Santos'
            ],
            [
                'venuename' => 'Championship Court C',
                'location' => 'Main Stadium, Indoor Facility, Court 3',
                'phone' => '+1-555-CHAMP',
                'contact_person_name' => 'David Silva'
            ],
            [
                'venuename' => 'Community Court D',
                'location' => 'Recreation Center, Youth Wing, Court 4',
                'phone' => '+1-555-COMM',
                'contact_person_name' => 'Ana Garcia'
            ]
        ];

        foreach ($venues as $venueData) {
            Venue::create($venueData);
        }
    }
}
