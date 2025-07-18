<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyAmenity;

class PropertyAmenitySeeder extends Seeder
{
    public function run()
    {
        // Common Amenities
        $commonAmenities = [
            ['name' => 'Washer/Dryer', 'category' => 'utility', 'slug' => 'washer-dryer', 'is_active' => true],
            ['name' => 'Granite Countertops', 'category' => 'kitchen', 'slug' => 'granite-countertops', 'is_active' => true],
            ['name' => 'Dishwasher', 'category' => 'kitchen', 'slug' => 'dishwasher', 'is_active' => true],
            ['name' => 'Double Vanity', 'category' => 'bathroom', 'slug' => 'double-vanity', 'is_active' => true],
            ['name' => 'Walk-in Shower', 'category' => 'bathroom', 'slug' => 'walk-in-shower', 'is_active' => true],
            ['name' => 'Swimming Pool', 'category' => 'outdoor', 'slug' => 'swimming-pool', 'is_active' => true],
            ['name' => 'Hot Tub', 'category' => 'outdoor', 'slug' => 'hot-tub', 'is_active' => true],
            ['name' => 'Fire Pit', 'category' => 'outdoor', 'slug' => 'fire-pit', 'is_active' => true],
            ['name' => 'Central Vacuum', 'category' => 'utility', 'slug' => 'central-vacuum', 'is_active' => true],
            ['name' => 'Water Softener', 'category' => 'utility', 'slug' => 'water-softener', 'is_active' => true],
            ['name' => 'Garbage Disposal', 'category' => 'utility', 'slug' => 'garbage-disposal', 'is_active' => true],
        ];

        // Add all amenities
        foreach ($commonAmenities as $amenity) {
            PropertyAmenity::create($amenity);
        }
    }
}
