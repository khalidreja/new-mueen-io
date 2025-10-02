<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        User::create([
            'name' => 'مدير النظام',
            'email' => 'admin@mueen.io',
            'password' => Hash::make('admin123'),
            'role' => 'admin',
            'status' => 'active',
            'subscription_type' => 'pro',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create sample teacher
        User::create([
            'name' => 'أحمد محمد المعلم',
            'email' => 'teacher@mueen.io',
            'password' => Hash::make('teacher123'),
            'role' => 'teacher',
            'status' => 'active',
            'subscription_type' => 'premium',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);

        // Create sample regular user
        User::create([
            'name' => 'محمد أحمد الطالب',
            'email' => 'user@mueen.io',
            'password' => Hash::make('user123'),
            'role' => 'user',
            'status' => 'active',
            'subscription_type' => 'free',
            'is_active' => true,
            'email_verified_at' => now(),
        ]);
    }
}