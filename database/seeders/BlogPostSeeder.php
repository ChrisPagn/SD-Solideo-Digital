<?php

namespace Database\Seeders;

use App\Models\BlogPost;
use Illuminate\Database\Seeder;

class BlogPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Laravel 11 : Les nouveautés à connaître',
                'slug' => 'laravel-11-nouveautes',
                'excerpt' => 'Découvrez toutes les nouvelles fonctionnalités de Laravel 11 et comment elles peuvent améliorer vos projets web.',
                'content' => "Laravel 11 apporte son lot de nouvelles fonctionnalités passionnantes pour les développeurs PHP. Dans cet article, nous explorons les améliorations majeures.

## Améliorations de performance

Laravel 11 introduit des optimisations significatives au niveau des performances, notamment dans la gestion du cache et des requêtes database.

## Nouvelles fonctionnalités

- Amélioration du système de queues
- Nouveau système de validation
- Meilleure intégration avec Vue.js 3
- Support natif de TypeScript

## Conclusion

Laravel 11 est une mise à jour majeure qui mérite d'être adoptée pour tous vos nouveaux projets.",
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(2),
            ],
            [
                'title' => 'Guide complet : Choisir les composants pour son PC Gaming 2024',
                'slug' => 'guide-composants-pc-gaming-2024',
                'excerpt' => 'Tout ce qu\'il faut savoir pour bien choisir chaque composant de votre futur PC gaming.',
                'content' => "Construire son PC gaming est une expérience enrichissante mais qui nécessite de faire les bons choix. Voici notre guide complet.

## Le processeur (CPU)

Pour le gaming en 2024, les AMD Ryzen 7000 et Intel 14e génération offrent d'excellentes performances. Le choix dépend de votre budget et de vos besoins spécifiques.

## La carte graphique (GPU)

C'est le composant le plus important pour le gaming. Les RTX 4000 de NVIDIA et les RX 7000 d'AMD sont les meilleures options actuelles.

## La mémoire RAM

32GB de DDR5 est devenu le standard pour le gaming moderne, surtout si vous faites du streaming en parallèle.

## Conclusion

Un bon équilibre entre tous les composants est la clé d'un PC gaming performant et durable.",
                'is_published' => true,
                'is_featured' => true,
                'published_at' => now()->subDays(5),
            ],
            [
                'title' => 'WebAssembly et Blazor : L\'avenir du développement web ?',
                'slug' => 'webassembly-blazor-avenir-web',
                'excerpt' => 'Analyse approfondie de WebAssembly et Blazor, et leur impact sur le développement web moderne.',
                'content' => "WebAssembly révolutionne le développement web en permettant d'exécuter du code compilé directement dans le navigateur.

## Qu'est-ce que WebAssembly ?

WebAssembly (WASM) est un format binaire portable qui s'exécute à une vitesse proche du natif dans les navigateurs modernes.

## Blazor : C# dans le navigateur

Blazor de Microsoft permet de développer des applications web complètes en C# grâce à WebAssembly.

## Avantages

- Performances exceptionnelles
- Réutilisation du code .NET
- Type-safety complet
- Écosystème riche

## Cas d'usage

Les applications Blazor excellent dans les domaines nécessitant des calculs intensifs ou une logique métier complexe.",
                'is_published' => true,
                'is_featured' => false,
                'published_at' => now()->subDays(7),
            ],
        ];

        foreach ($posts as $post) {
            BlogPost::create($post);
        }
    }
}
