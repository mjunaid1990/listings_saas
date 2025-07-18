<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyFeature;

class PropertyFeatureSeeder extends Seeder
{
    public function run()
    {
        // Common Features
        $commonFeatures = [
            ['name' => 'Central Air', 'category' => 'comfort', 'slug' => 'central-air', 'is_active' => true],
            ['name' => 'Central Heat', 'category' => 'comfort', 'slug' => 'central-heat', 'is_active' => true],
            ['name' => 'Fireplace', 'category' => 'comfort', 'slug' => 'fireplace', 'is_active' => true],
            ['name' => 'Hardwood Floors', 'category' => 'interior', 'slug' => 'hardwood-floors', 'is_active' => true],
            ['name' => 'Tile Floors', 'category' => 'interior', 'slug' => 'tile-floors', 'is_active' => true],
            ['name' => 'Carpet', 'category' => 'interior', 'slug' => 'carpet', 'is_active' => true],
            ['name' => 'Walk-in Closets', 'category' => 'storage', 'slug' => 'walk-in-closets', 'is_active' => true],
            ['name' => 'Vaulted Ceilings', 'category' => 'interior', 'slug' => 'vaulted-ceilings', 'is_active' => true],
            ['name' => 'Deck', 'category' => 'outdoor', 'slug' => 'deck', 'is_active' => true],
            ['name' => 'Patio', 'category' => 'outdoor', 'slug' => 'patio', 'is_active' => true],
            ['name' => 'Garage', 'category' => 'parking', 'slug' => 'garage', 'is_active' => true],
            ['name' => 'Off-street Parking', 'category' => 'parking', 'slug' => 'off-street-parking', 'is_active' => true],
            ['name' => 'Fenced Yard', 'category' => 'security', 'slug' => 'fenced-yard', 'is_active' => true],
            ['name' => 'Smart Thermostat', 'category' => 'smart_home', 'slug' => 'smart-thermostat', 'is_active' => true],
            ['name' => 'Smart Security', 'category' => 'smart_home', 'slug' => 'smart-security', 'is_active' => true],
            ['name' => 'Solar Panels', 'category' => 'energy', 'slug' => 'solar-panels', 'is_active' => true],
            ['name' => 'LED Lighting', 'category' => 'energy', 'slug' => 'led-lighting', 'is_active' => true],
        ];

        // Add all features
        foreach ($commonFeatures as $feature) {
            PropertyFeature::create($feature);
        }
    }
}
