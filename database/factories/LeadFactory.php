<?php

namespace Database\Factories;

use App\Models\Lead;
use Illuminate\Database\Eloquent\Factories\Factory;

class LeadFactory extends Factory
{
    protected $model = Lead::class;

    public function definition(): array
    {
        return [
            'property_id' => fn () => \App\Models\Property::factory(),
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'message' => $this->faker->paragraph,
            'is_contacted' => $this->faker->boolean,
        ];
    }

    public function contacted()
    {
        return $this->state([
            'is_contacted' => true,
        ]);
    }

    public function notContacted()
    {
        return $this->state([
            'is_contacted' => false,
        ]);
    }
}
