@extends('layouts.app')

@section('title', 'Nos Services - Solideo Digital')
@section('description', 'Découvrez nos services de développement web, montage PC sur mesure et formations professionnelles')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 6rem 0 4rem;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white;">Nos Services</h1>
        <p class="hero-subtitle" style="color: var(--color-beige);">
            Des solutions technologiques complètes pour tous vos besoins digitaux
        </p>
    </div>
</section>

<!-- Services Section -->
<section class="section">
    <div class="section-container">
        <div class="services-grid">
            @forelse($services as $service)
            <div class="service-card">
                @if($service->icon)
                <div class="service-icon">{{ $service->icon }}</div>
                @endif
                <h3 class="service-title">{{ $service->name }}</h3>
                <p class="service-description">{{ $service->short_description }}</p>
                <a href="{{ route('services.show', $service->slug) }}" style="color: var(--color-gold); font-weight: 600; text-decoration: none;">En savoir plus →</a>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                <p style="color: var(--color-gray-600); font-size: 1.1rem;">Aucun service disponible pour le moment.</p>
            </div>
            @endforelse
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); color: white;">
    <div class="section-container" style="text-align: center;">
        <h2 class="section-title" style="color: white;">Besoin d'un service spécifique ?</h2>
        <p class="section-subtitle" style="color: var(--color-beige);">
            Contactez-nous pour discuter de votre projet
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 2rem;">
            <a href="{{ route('contact') }}" class="btn btn-primary">Nous contacter</a>
            <a href="{{ route('appointments.create') }}" class="btn btn-outline" style="border-color: white; color: white;">Prendre rendez-vous</a>
        </div>
    </div>
</section>
@endsection
