<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Database\Seeder;

class QuickBlogSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::first();
        
        $posts = [
            [
                'title' => 'Laravel 11 : Les nouveautés',
                'slug' => 'laravel-11-nouveautes',
                'excerpt' => 'Découvrez les nouvelles fonctionnalités de Laravel 11.',
                'content' => 'Laravel 11 apporte son lot de nouvelles fonctionnalités passionnantes pour les développeurs PHP.',
                'user_id' => $user->id,
                'is_published' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Guide composants PC Gaming 2024',
                'slug' => 'guide-pc-gaming-2024',
                'excerpt' => 'Tout ce qu\'il faut savoir pour bien choisir ses composants PC.',
                'content' => 'Construire son PC gaming est une expérience enrichissante. Voici notre guide complet.',
                'user_id' => $user->id,
                'is_published' => true,
                'published_at' => now()->subDays(5),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }
    }
}
