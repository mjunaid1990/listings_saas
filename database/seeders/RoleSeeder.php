<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Create roles
        $adminRole = Role::create([
            'name' => 'Administrator',
            'slug' => 'admin',
            'permissions' => [
                'manage-users',
                'manage-roles',
                'manage-subscriptions',
                'manage-properties',
                'manage-leads',
            ],
        ]);

        $userRole = Role::create([
            'name' => 'User',
            'slug' => 'user',
            'permissions' => [
                'manage-properties',
                'manage-leads',
            ],
        ]);

        // Create admin user
        $admin = User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $admin->roles()->attach($adminRole);

        // Create regular user
        $user = User::create([
            'name' => 'Regular User',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        $user->roles()->attach($userRole);
    }
}
