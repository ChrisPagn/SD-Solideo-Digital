<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        $services = [
            [
                'name' => 'Développement Web avec Laravel',
                'slug' => 'developpement-web-laravel',
                'icon' => '🚀',
                'short_description' => 'Applications web performantes et évolutives développées avec Laravel (PHP)',
                'description' => "Nous développons des applications web modernes et performantes en utilisant Laravel, le framework PHP le plus populaire. Notre expertise couvre :

- Développement d'applications web sur mesure
- API RESTful et GraphQL
- Intégration de bases de données
- Système d'authentification et autorisation
- Optimisation des performances
- Maintenance et support",
                'price' => 'À partir de 2500€ selon la complexité du projet',
                'is_active' => true,
                'is_featured' => true,
                'order' => 1,
            ],
            [
                'name' => 'Applications WebAssembly (C#/Blazor)',
                'slug' => 'webassembly-blazor',
                'icon' => '⚡',
                'short_description' => 'Applications web ultra-performantes avec WebAssembly et Blazor',
                'description' => "Développement d'applications web de nouvelle génération utilisant WebAssembly pour des performances optimales :

- Applications Blazor WebAssembly
- Migration d'applications desktop vers le web
- Intégration .NET et C#
- Performances natives dans le navigateur
- Applications temps réel",
                'price' => 'Sur devis - Consultation gratuite',
                'is_active' => true,
                'is_featured' => true,
                'order' => 2,
            ],
            [
                'name' => 'Backend Spring Boot (Java)',
                'slug' => 'spring-boot-java',
                'icon' => '☕',
                'short_description' => 'APIs robustes et microservices avec Spring Boot',
                'description' => "Développement de solutions backend robustes avec Spring Boot :

- API RESTful enterprise-grade
- Architecture microservices
- Sécurité Spring Security
- Intégration bases de données (JPA/Hibernate)
- Tests unitaires et d'intégration
- Documentation OpenAPI/Swagger",
                'price' => 'À partir de 3000€',
                'is_active' => true,
                'is_featured' => false,
                'order' => 3,
            ],
            [
                'name' => 'Montage PC sur Mesure',
                'slug' => 'montage-pc-sur-mesure',
                'icon' => '🖥️',
                'short_description' => 'Configuration et assemblage de PC personnalisés selon vos besoins',
                'description' => "Nous configurons et assemblons votre PC parfait selon vos besoins :

- PC Gaming haute performance
- Stations de travail professionnelles
- PC bureautique optimisés
- Conseils personnalisés sur les composants
- Installation et configuration Windows/Linux
- Garantie et support après-vente",
                'price' => 'À partir de 80€ (hors composants) - Devis gratuit',
                'is_active' => true,
                'is_featured' => true,
                'order' => 4,
            ],
            [
                'name' => 'Dépannage & Maintenance PC',
                'slug' => 'depannage-maintenance-pc',
                'icon' => '🔧',
                'short_description' => 'Réparation et maintenance informatique professionnelle',
                'description' => "Service de dépannage et maintenance pour tous vos problèmes informatiques :

- Diagnostic et réparation hardware
- Nettoyage et optimisation système
- Récupération de données
- Mise à jour et migration
- Suppression de virus/malwares
- Support à distance ou sur site",
                'price' => 'Diagnostic gratuit - Intervention à partir de 50€',
                'is_active' => true,
                'is_featured' => false,
                'order' => 5,
            ],
            [
                'name' => 'Formations & Assistance Technique',
                'slug' => 'formations-assistance',
                'icon' => '🎓',
                'short_description' => 'Micro-formations et accompagnement personnalisé',
                'description' => "Formations et assistance technique adaptées à vos besoins :

- Formations en développement web (Laravel, React, etc.)
- Formations en administration système
- Micro-formations ciblées (2-4h)
- Accompagnement sur vos projets
- Mentorat et code review
- Support technique à distance",
                'price' => 'À partir de 60€/heure - Forfaits disponibles',
                'is_active' => true,
                'is_featured' => false,
                'order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
