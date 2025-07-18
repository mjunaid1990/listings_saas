<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    public function run(): void
    {
        Plan::create([
            'name' => 'Basic',
            'price' => 9.99,
            'max_listings' => 5,
            'features' => json_encode([
                '5 Active Listings',
                'Basic Analytics',
                'Standard Support',
                'Basic SEO Optimization',
            ]),

        ]);

        Plan::create([
            'name' => 'Professional',
            'price' => 29.99,
            'max_listings' => 20,
            'features' => json_encode([
                '20 Active Listings',
                'Advanced Analytics',
                'Priority Support',
                'Premium SEO Optimization',
                'Custom Branding',
            ]),

        ]);

        Plan::create([
            'name' => 'Premium',
            'price' => 49.99,
            'max_listings' => 50,
            'features' => json_encode([
                '50 Active Listings',
                'Enterprise Analytics',
                '24/7 Support',
                'Advanced SEO Optimization',
                'Custom Branding',
                'Custom URL',
                'Priority Listing',
            ]),

        ]);
    }
}
