<?php

namespace Database\Seeders;

use App\Models\Property;
use App\Models\User;
use App\Models\PropertyType;
use App\Models\PropertyFeature;
use App\Models\PropertyAmenity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PropertySeeder extends Seeder
{
    public function run(): void
    {
        // Create properties for each user
        User::all()->each(function (User $user) {
            // Create properties with unique slugs
            $counter = 1;
            // Get random property type
            $propertyType = PropertyType::inRandomOrder()->first();
            
            // Get random features and amenities
            $features = PropertyFeature::inRandomOrder()->take(5)->pluck('id')->toArray();
            $amenities = PropertyAmenity::inRandomOrder()->take(5)->pluck('id')->toArray();

            $property = Property::create([
                'user_id' => $user->id,
                'property_type_id' => $propertyType->id,
                'title' => 'Active Property 1',
                'slug' => Str::slug('Active Property 1') . '-' . $user->id . '-' . $counter++,
                'description' => 'This is an active property.',
                'status' => 'active',
                'property_status' => 'for_sale',
                'price' => 100000,
                'address' => '123 Active St',
                'latitude' => 37.7749,
                'longitude' => -122.4194,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'square_feet' => 1500,
                'lot_size' => 5000,
                'year_built' => 2000,
                'currency' => 'USD',
                'hoa_fees' => 200,
                'property_taxes' => 3000,
                'stories' => 2,
                'has_basement' => true,
                'garage_spaces' => 2,
                'heating_type' => 'central',
                'cooling_type' => 'central',
                'roof_type' => 'asphalt',
                'flooring_type' => 'hardwood',
                'exterior_material' => 'brick',
                'has_pool' => true,
                'has_fireplace' => true,
                'energy_efficiency_rating' => 'A',
                'is_smart_home' => true,
                'additional_features' => json_encode(['garden' => true, 'patio' => true]),
                'rental_terms' => json_encode(['lease_term' => '12 months', 'pets_allowed' => true]),
                'legal_documents' => json_encode(['title_deed' => 'available', 'inspection_report' => 'available']),
                'virtual_tour' => json_encode(['url' => 'https://example.com/virtual-tour']),
                'floor_plans' => json_encode(['url' => 'https://example.com/floor-plans'])
            ]);

            // Sync features and amenities
            $property->features()->sync($features);
            $property->amenities()->sync($amenities);

            // Get random property type
            $propertyType = PropertyType::inRandomOrder()->first();
            
            // Get random features and amenities
            $features = PropertyFeature::inRandomOrder()->take(5)->pluck('id')->toArray();
            $amenities = PropertyAmenity::inRandomOrder()->take(5)->pluck('id')->toArray();

            $property = Property::create([
                'user_id' => $user->id,
                'property_type_id' => $propertyType->id,
                'title' => 'Active Property 2',
                'slug' => Str::slug('Active Property 2') . '-' . $user->id . '-' . $counter++,
                'description' => 'Another active property.',
                'status' => 'active',
                'property_status' => 'for_sale',
                'price' => 120000,
                'address' => '456 Active St',
                'latitude' => 37.7749,
                'longitude' => -122.4194,
                'bedrooms' => 4,
                'bathrooms' => 3,
                'square_feet' => 2000,
                'lot_size' => 6000,
                'year_built' => 2010,
                'currency' => 'USD',
                'hoa_fees' => 300,
                'property_taxes' => 4000,
                'stories' => 3,
                'has_basement' => true,
                'garage_spaces' => 3,
                'heating_type' => 'central',
                'cooling_type' => 'central',
                'roof_type' => 'metal',
                'flooring_type' => 'hardwood',
                'exterior_material' => 'stucco',
                'has_pool' => true,
                'has_fireplace' => true,
                'energy_efficiency_rating' => 'A',
                'is_smart_home' => true,
                'additional_features' => json_encode(['garden' => true, 'patio' => true]),
                'rental_terms' => json_encode(['lease_term' => '12 months', 'pets_allowed' => true]),
                'legal_documents' => json_encode(['title_deed' => 'available', 'inspection_report' => 'available']),
                'virtual_tour' => json_encode(['url' => 'https://example.com/virtual-tour']),
                'floor_plans' => json_encode(['url' => 'https://example.com/floor-plans'])
            ]);

            // Sync features and amenities
            $property->features()->sync($features);
            $property->amenities()->sync($amenities);

            // Get random property type
            $propertyType = PropertyType::inRandomOrder()->first();
            
            // Get random features and amenities
            $features = PropertyFeature::inRandomOrder()->take(5)->pluck('id')->toArray();
            $amenities = PropertyAmenity::inRandomOrder()->take(5)->pluck('id')->toArray();

            $property = Property::create([
                'user_id' => $user->id,
                'property_type_id' => $propertyType->id,
                'title' => 'Active Property 3',
                'slug' => Str::slug('Active Property 3') . '-' . $user->id . '-' . $counter++,
                'description' => 'One more active property.',
                'status' => 'active',
                'property_status' => 'for_sale',
                'price' => 150000,
                'address' => '789 Active St',
                'latitude' => 37.7749,
                'longitude' => -122.4194,
                'bedrooms' => 5,
                'bathrooms' => 4,
                'square_feet' => 2500,
                'lot_size' => 7000,
                'year_built' => 2015,
                'currency' => 'USD',
                'hoa_fees' => 400,
                'property_taxes' => 5000,
                'stories' => 4,
                'has_basement' => true,
                'garage_spaces' => 4,
                'heating_type' => 'central',
                'cooling_type' => 'central',
                'roof_type' => 'tile',
                'flooring_type' => 'hardwood',
                'exterior_material' => 'wood',
                'has_pool' => true,
                'has_fireplace' => true,
                'energy_efficiency_rating' => 'A',
                'is_smart_home' => true,
                'additional_features' => json_encode(['garden' => true, 'patio' => true]),
                'rental_terms' => json_encode(['lease_term' => '12 months', 'pets_allowed' => true]),
                'legal_documents' => json_encode(['title_deed' => 'available', 'inspection_report' => 'available']),
                'virtual_tour' => json_encode(['url' => 'https://example.com/virtual-tour']),
                'floor_plans' => json_encode(['url' => 'https://example.com/floor-plans'])
            ]);

            // Sync features and amenities
            $property->features()->sync($features);
            $property->amenities()->sync($amenities);

            // Get random property type for inactive property
            $propertyType = PropertyType::inRandomOrder()->first();
            
            // Get random features and amenities
            $features = PropertyFeature::inRandomOrder()->take(5)->pluck('id')->toArray();
            $amenities = PropertyAmenity::inRandomOrder()->take(5)->pluck('id')->toArray();

            $property = Property::create([
                'user_id' => $user->id,
                'property_type_id' => $propertyType->id,
                'title' => 'Inactive Property 1',
                'slug' => Str::slug('Inactive Property 1') . '-' . $user->id . '-' . $counter++,
                'description' => 'This is an inactive property.',
                'status' => 'inactive',
                'property_status' => 'for_rent',
                'price' => 80000,
                'address' => '123 Inactive St',
                'latitude' => 37.7749,
                'longitude' => -122.4194,
                'bedrooms' => 2,
                'bathrooms' => 1,
                'square_feet' => 1000,
                'lot_size' => 4000,
                'year_built' => 1990,
                'currency' => 'USD',
                'hoa_fees' => 150,
                'property_taxes' => 2000,
                'stories' => 1,
                'has_basement' => false,
                'garage_spaces' => 1,
                'heating_type' => 'baseboard',
                'cooling_type' => 'window',
                'roof_type' => 'asphalt',
                'flooring_type' => 'carpet',
                'exterior_material' => 'vinyl',
                'has_pool' => false,
                'has_fireplace' => false,
                'energy_efficiency_rating' => 'B',
                'is_smart_home' => false,
                'additional_features' => json_encode(['patio' => true]),
                'rental_terms' => json_encode(['lease_term' => '6 months', 'pets_allowed' => false]),
                'legal_documents' => json_encode(['title_deed' => 'available', 'inspection_report' => 'available']),
                'virtual_tour' => json_encode(['url' => 'https://example.com/virtual-tour']),
                'floor_plans' => json_encode(['url' => 'https://example.com/floor-plans'])
            ]);

            // Sync features and amenities
            $property->features()->sync($features);
            $property->amenities()->sync($amenities);

            // Get random property type for inactive property
            $propertyType = PropertyType::inRandomOrder()->first();
            
            // Get random features and amenities
            $features = PropertyFeature::inRandomOrder()->take(5)->pluck('id')->toArray();
            $amenities = PropertyAmenity::inRandomOrder()->take(5)->pluck('id')->toArray();

            $property = Property::create([
                'user_id' => $user->id,
                'property_type_id' => $propertyType->id,
                'title' => 'Inactive Property 2',
                'slug' => Str::slug('Inactive Property 2') . '-' . $user->id . '-' . $counter++,
                'description' => 'Another inactive property.',
                'status' => 'inactive',
                'property_status' => 'for_rent',
                'price' => 90000,
                'address' => '456 Inactive St',
                'latitude' => 37.7749,
                'longitude' => -122.4194,
                'bedrooms' => 3,
                'bathrooms' => 2,
                'square_feet' => 1200,
                'lot_size' => 4500,
                'year_built' => 1995,
                'currency' => 'USD',
                'hoa_fees' => 180,
                'property_taxes' => 2200,
                'stories' => 1,
                'has_basement' => false,
                'garage_spaces' => 1,
                'heating_type' => 'baseboard',
                'cooling_type' => 'window',
                'roof_type' => 'asphalt',
                'flooring_type' => 'carpet',
                'exterior_material' => 'vinyl',
                'has_pool' => false,
                'has_fireplace' => false,
                'energy_efficiency_rating' => 'B',
                'is_smart_home' => false,
                'additional_features' => json_encode(['patio' => true]),
                'rental_terms' => json_encode(['lease_term' => '6 months', 'pets_allowed' => false]),
                'legal_documents' => json_encode(['title_deed' => 'available', 'inspection_report' => 'available']),
                'virtual_tour' => json_encode(['url' => 'https://example.com/virtual-tour']),
                'floor_plans' => json_encode(['url' => 'https://example.com/floor-plans'])
            ]);

            // Sync features and amenities
            $property->features()->sync($features);
            $property->amenities()->sync($amenities);

        });

        // Create some sample leads for properties
        Property::all()->each(function (Property $property) {
            $property->leads()->create([
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '555-1234',
                'message' => 'Interested in the property',
                'status' => 'new',
            ]);

            $property->leads()->create([
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '555-5678',
                'message' => 'Would like to see the property',
                'status' => 'new',
            ]);
        });
    }
}
