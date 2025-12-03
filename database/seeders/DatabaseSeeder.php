<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin Solideo',
            'email' => 'admin@solideo-digital.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);

        // Call other seeders
        $this->call([
            ServiceSeeder::class,
            QuickProjectSeeder::class,
            QuickBlogSeeder::class,
            TestimonialSeeder::class,
        ]);
    }
}
