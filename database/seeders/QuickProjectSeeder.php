<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class QuickProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-commerce Laravel',
                'slug' => 'ecommerce-laravel',
                'description' => 'Plateforme e-commerce complète',
                'content' => 'Développement d\'une plateforme e-commerce complète avec Laravel.',
                'category' => 'laravel',
                'technologies' => json_encode(['Laravel', 'Vue.js', 'MySQL']),
                'client' => 'Fashion & Co',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'PC Gaming RGB',
                'slug' => 'pc-gaming-rgb',
                'description' => 'PC gaming haute performance',
                'content' => 'Configuration et assemblage d\'un PC gaming haut de gamme.',
                'category' => 'pc-custom',
                'technologies' => json_encode(['RTX 4080', 'Ryzen 9']),
                'client' => 'Gamer Pro',
                'is_active' => true,
                'is_featured' => true,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
