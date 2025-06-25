<?php

namespace Database\Seeders;

use App\Models\Property;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // Create 50 properties
        Property::factory(50)->create()->each(function ($property) {
            // For each property, create 0-5 bookings
            $bookingCount = rand(0, 5);
            if ($bookingCount > 0) {
                $property->bookings()->createMany(
                    \Database\Factories\BookingFactory::new()->count($bookingCount)->make()->toArray()
                );
            }
            
            // 20% chance to have a deleted property
            if (rand(1, 5) === 1) {
                $property->delete();
            }
        });
        
        $this->command->info('Successfully seeded 50 properties with random bookings!');
    }
}