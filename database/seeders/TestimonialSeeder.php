<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $testimonials = [
            [
                'client_name' => 'Marie Dubois',
                'client_position' => 'Directrice',
                'client_company' => 'Fashion & Co',
                'testimonial' => 'Excellent travail sur notre plateforme e-commerce ! L\'équipe a su comprendre nos besoins et livrer un produit de qualité dans les délais. Le site est rapide, moderne et facile à utiliser.',
                'rating' => 5,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'client_name' => 'Thomas Martin',
                'client_position' => 'Responsable IT',
                'client_company' => 'TechCorp Solutions',
                'testimonial' => 'Le développement de notre application RH a été un vrai succès. Architecture solide, code propre et documentation complète. Je recommande vivement leurs services.',
                'rating' => 5,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'client_name' => 'Alexandre Laurent',
                'client_position' => 'Gamer Pro',
                'client_company' => null,
                'testimonial' => 'Mon nouveau PC gaming est une bête ! Parfaitement optimisé pour le streaming en 4K. L\'équipe a pris le temps de m\'expliquer chaque choix de composant. Service impeccable.',
                'rating' => 5,
                'is_active' => true,
                'is_featured' => true,
            ],
            [
                'client_name' => 'Sophie Bernard',
                'client_position' => 'CEO',
                'client_company' => 'Studio Créatif Plus',
                'testimonial' => 'La station de travail configurée pour notre studio dépasse toutes nos attentes. Le rendu 3D est ultra-rapide et le montage vidéo 8K se fait sans ralentissement. Investissement rentabilisé !',
                'rating' => 5,
                'is_active' => true,
                'is_featured' => false,
            ],
            [
                'client_name' => 'Pierre Lefevre',
                'client_position' => 'Lead Developer',
                'client_company' => 'Digital Agency Pro',
                'testimonial' => 'La formation Laravel pour notre équipe était exceptionnelle. Contenu riche, exemples pratiques et formateur très pédagogue. Toute l\'équipe a progressé rapidement.',
                'rating' => 5,
                'is_active' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::create($testimonial);
        }
    }
}
