<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Venue;

class VenuePriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get all venues
        $venues = Venue::all();
        
        // Update each venue with a price if it doesn't have one
        foreach ($venues as $venue) {
            if (!isset($venue->price) || $venue->price == 0) {
                // Set a random price between 800 and 1500
                $venue->price = rand(800, 1500);
                $venue->save();
            }
        }
        
        $this->command->info('Venue prices have been updated!');
    }
}