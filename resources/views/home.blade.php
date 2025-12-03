@extends('layouts.app')

@section('title', 'Solideo Digital - Solutions. Développement. Excellence.')
@section('description', 'Solideo Digital offre des solutions de développement web (Laravel, WebAssembly, Spring Boot), du montage PC sur mesure et des formations professionnelles.')

@section('content')
<!-- Hero Section -->
<section class="hero">
    <div class="hero-container">
        <h1 class="hero-title">SOLIDEO DIGITAL</h1>
        <p class="hero-tagline">Solutions. Développement. Excellence.</p>
        <p class="hero-subtitle">
            Développement Web • Montage PC sur Mesure • Formations & Assistance
        </p>
        <div class="hero-buttons">
            <a href="{{ route('services') }}" class="btn btn-primary">Découvrir nos services</a>
            <a href="{{ route('contact') }}" class="btn btn-outline">Nous contacter</a>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="section" style="background-color: var(--color-gray-50);">
    <div class="section-container">
        <h2 class="section-title">Nos Services</h2>
        <p class="section-subtitle">
            Des solutions technologiques complètes pour vos projets digitaux
        </p>

        <div class="services-grid">
            <!-- Développement Web -->
            <div class="service-card">
                <div class="service-icon">💻</div>
                <h3 class="service-title">Développement Web</h3>
                <p class="service-description">
                    Applications web performantes avec Laravel (PHP), WebAssembly (C#), et Spring Boot (Java).
                    Solutions sur mesure adaptées à vos besoins.
                </p>
                <a href="{{ route('services') }}" style="color: var(--color-gold); font-weight: 600; text-decoration: none;">En savoir plus →</a>
            </div>

            <!-- Montage PC -->
            <div class="service-card">
                <div class="service-icon">🖥️</div>
                <h3 class="service-title">PC sur Mesure</h3>
                <p class="service-description">
                    Configuration et montage de PC personnalisés selon vos besoins.
                    Dépannage et maintenance informatique professionnelle.
                </p>
                <a href="{{ route('appointments.create') }}" style="color: var(--color-gold); font-weight: 600; text-decoration: none;">Prendre rendez-vous →</a>
            </div>

            <!-- Formation -->
            <div class="service-card">
                <div class="service-icon">🎓</div>
                <h3 class="service-title">Formations & Assistance</h3>
                <p class="service-description">
                    Micro-formations et assistance technique personnalisée.
                    Accompagnement dans vos projets de développement.
                </p>
                <a href="{{ route('contact') }}" style="color: var(--color-gold); font-weight: 600; text-decoration: none;">Nous contacter →</a>
            </div>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="section">
    <div class="section-container">
        <h2 class="section-title">Technologies Maîtrisées</h2>
        <p class="section-subtitle">
            Expertise dans les technologies modernes de développement
        </p>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 2rem; margin-top: 3rem;">
            <div style="text-align: center; padding: 2rem; background: white; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--color-gold); font-size: 2rem; margin-bottom: 0.5rem;">Laravel</h3>
                <p style="color: var(--color-gray-600);">PHP Framework</p>
            </div>
            <div style="text-align: center; padding: 2rem; background: white; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--color-gold); font-size: 2rem; margin-bottom: 0.5rem;">WebAssembly</h3>
                <p style="color: var(--color-gray-600);">C# / Blazor</p>
            </div>
            <div style="text-align: center; padding: 2rem; background: white; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-sm);">
                <h3 style="color: var(--color-gold); font-size: 2rem; margin-bottom: 0.5rem;">Spring Boot</h3>
                <p style="color: var(--color-gray-600);">Java Framework</p>
            </div>
        </div>
    </div>
</section>

<!-- Portfolio Section -->
@if($featuredProjects->count() > 0)
<section class="section" style="background-color: var(--color-gray-50);">
    <div class="section-container">
        <h2 class="section-title">Projets Récents</h2>
        <p class="section-subtitle">
            Découvrez nos réalisations
        </p>

        <div class="services-grid">
            @foreach($featuredProjects as $project)
            <div class="service-card">
                @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                     style="width: 100%; height: 200px; object-fit: cover; border-radius: var(--border-radius-md); margin-bottom: 1rem;">
                @endif
                <h3 class="service-title">{{ $project->title }}</h3>
                <p class="service-description">{{ Str::limit($project->description, 120) }}</p>
                <a href="{{ route('projects.show', $project->slug) }}" style="color: var(--color-gold); font-weight: 600; text-decoration: none;">Voir le projet →</a>
            </div>
            @endforeach
        </div>

        <div style="text-align: center; margin-top: 3rem;">
            <a href="{{ route('projects') }}" class="btn btn-secondary">Voir tous les projets</a>
        </div>
    </div>
</section>
@endif

<!-- Testimonials Section -->
@if($testimonials->count() > 0)
<section class="section">
    <div class="section-container">
        <h2 class="section-title">Témoignages Clients</h2>
        <p class="section-subtitle">
            Ce que nos clients disent de nous
        </p>

        <div class="services-grid">
            @foreach($testimonials as $testimonial)
            <div class="service-card">
                <div style="color: var(--color-gold); font-size: 1.5rem; margin-bottom: 1rem;">
                    @for($i = 0; $i < $testimonial->rating; $i++)
                        ⭐
                    @endfor
                </div>
                <p style="font-style: italic; color: var(--color-gray-700); margin-bottom: 1rem;">
                    "{{ $testimonial->testimonial }}"
                </p>
                <div>
                    <strong style="color: var(--color-navy);">{{ $testimonial->client_name }}</strong>
                    @if($testimonial->client_position || $testimonial->client_company)
                    <br>
                    <span style="color: var(--color-gray-600); font-size: 0.9rem;">
                        {{ $testimonial->client_position }}
                        @if($testimonial->client_position && $testimonial->client_company) - @endif
                        {{ $testimonial->client_company }}
                    </span>
                    @endif
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif

<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); color: white;">
    <div class="section-container" style="text-align: center;">
        <h2 class="section-title" style="color: white;">Prêt à démarrer votre projet ?</h2>
        <p class="section-subtitle" style="color: var(--color-beige);">
            Contactez-nous pour discuter de vos besoins et obtenir un devis personnalisé
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 2rem;">
            <a href="{{ route('contact') }}" class="btn btn-primary">Nous contacter</a>
            <a href="{{ route('appointments.create') }}" class="btn btn-outline" style="border-color: white; color: white;">Prendre rendez-vous</a>
        </div>
    </div>
</section>

@endsection
