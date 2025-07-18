<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PropertyType;

class PropertyTypeSeeder extends Seeder
{
    public function run()
    {
        $propertyTypes = [
            [
                'name' => 'House',
                'slug' => 'house',
                'description' => 'Single-family residential property',
                'is_active' => true
            ],
            [
                'name' => 'Apartment',
                'slug' => 'apartment',
                'description' => 'Multi-unit residential property',
                'is_active' => true
            ],
            [
                'name' => 'Condominium',
                'slug' => 'condominium',
                'description' => 'Private residence in a multi-unit building',
                'is_active' => true
            ],
            [
                'name' => 'Townhouse',
                'slug' => 'townhouse',
                'description' => 'Multi-story home attached to one or more units',
                'is_active' => true
            ],
            [
                'name' => 'Commercial',
                'slug' => 'commercial',
                'description' => 'Business or office space',
                'is_active' => true
            ],
            [
                'name' => 'Land',
                'slug' => 'land',
                'description' => 'Unbuilt property',
                'is_active' => true
            ]
        ];

        foreach ($propertyTypes as $type) {
            PropertyType::create($type);
        }
    }
}
