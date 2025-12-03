<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    public function run(): void
    {
        $projects = [
            [
                'title' => 'E-commerce Laravel pour boutique de mode',
                'slug' => 'ecommerce-laravel-boutique-mode',
                'description' => "Développement d'une plateforme e-commerce complète avec système de paiement intégré, gestion de stock, et interface d'administration. Utilisation de Laravel 11, Stripe pour les paiements, et Vue.js pour l'interface utilisateur dynamique.",
                'category' => 'web',
                'technologies' => 'Laravel,Vue.js,MySQL,Stripe,Tailwind CSS',
                'client' => 'Boutique Fashion & Co',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Application de gestion RH (Spring Boot)',
                'slug' => 'application-gestion-rh-spring-boot',
                'description' => "Système de gestion des ressources humaines comprenant la gestion des employés, des congés, des évaluations et de la paie. Backend développé en Spring Boot avec une architecture microservices.",
                'category' => 'web',
                'technologies' => 'Spring Boot,Java,PostgreSQL,React,Docker',
                'client' => 'TechCorp Solutions',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'PC Gaming haute performance RGB',
                'slug' => 'pc-gaming-rgb-high-end',
                'description' => "Configuration et assemblage d'un PC gaming haut de gamme avec éclairage RGB synchronisé. Composants: RTX 4080, Ryzen 9 7950X, 32GB DDR5, watercooling custom. Performances optimales pour le gaming 4K et le streaming.",
                'category' => 'pc',
                'technologies' => 'RTX 4080,Ryzen 9 7950X,DDR5,Watercooling',
                'client' => 'Client particulier - Gamer professionnel',
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Station de travail pour création de contenu',
                'slug' => 'workstation-creation-contenu',
                'description' => "PC ultra-performant pour le montage vidéo 4K/8K et le rendu 3D. Optimisé pour Adobe Creative Suite, DaVinci Resolve et Blender. Stockage NVMe RAID pour performances maximales.",
                'category' => 'pc',
                'technologies' => 'Threadripper,RTX 4090,128GB RAM,NVMe RAID',
                'client' => 'Studio Créatif Plus',
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Formation Laravel pour équipe de développement',
                'slug' => 'formation-laravel-equipe-dev',
                'description' => "Programme de formation intensive de 5 jours sur Laravel pour une équipe de 8 développeurs. Couvrant les bases jusqu'aux concepts avancés: architecture MVC, Eloquent ORM, API RESTful, tests automatisés, et déploiement.",
                'category' => 'formation',
                'technologies' => 'Laravel,PHP,MySQL,Git,PHPUnit',
                'client' => 'Digital Agency Pro',
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($projects as $project) {
            Project::create($project);
        }
    }
}
