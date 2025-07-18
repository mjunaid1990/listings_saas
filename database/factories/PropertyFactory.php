<?php

namespace Database\Factories;

use App\Models\Property;
use Illuminate\Database\Eloquent\Factories\Factory;

class PropertyFactory extends Factory
{
    protected $model = Property::class;

    public function definition(): array
    {
        return [
            'user_id' => fn () => \App\Models\User::factory(),
            'title' => $this->faker->sentence,
            'slug' => $this->faker->slug,
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 100000, 500000),
            'address' => $this->faker->address,
            'latitude' => $this->faker->latitude,
            'longitude' => $this->faker->longitude,
            'status' => $this->faker->randomElement(['active', 'inactive']),
        ];
    }

    public function active()
    {
        return $this->state([
            'status' => 'active',
        ]);
    }

    public function withPhotos($count = 3)
    {
        return $this->afterCreating(function (Property $property) use ($count) {
            PropertyPhoto::factory($count)->create([
                'property_id' => $property->id,
            ]);
        });
    }
}
