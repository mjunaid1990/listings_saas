<?php

namespace Database\Factories;

use App\Models\Plan;
use Illuminate\Database\Eloquent\Factories\Factory;

class PlanFactory extends Factory
{
    protected $model = Plan::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->randomElement([
                'Basic', 'Professional', 'Premium', 'Enterprise'
            ]),
            'price' => $this->faker->randomFloat(2, 9.99, 99.99),
            'max_listings' => $this->faker->numberBetween(1, 100),
            'features' => [
                'Unlimited listings',
                'Premium listing features',
                '24/7 support',
                'Custom branding',
                'Advanced analytics',
            ],
            'stripe_plan_id' => $this->faker->unique()->randomNumber(10),
        ];
    }
}
