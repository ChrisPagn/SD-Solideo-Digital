@extends('layouts.app')

@section('title', 'À propos - Solideo Digital')
@section('description', 'Découvrez Solideo Digital, votre partenaire en développement web, montage PC et formations.')

@section('content')
<section class="hero" style="min-height: 50vh;">
    <div class="hero-container">
        <h1 class="hero-title">À Propos</h1>
        <p class="hero-subtitle">Solideo Digital - Solutions. Développement. Excellence.</p>
    </div>
</section>

<section class="section">
    <div class="section-container">
        <h2 class="section-title">Notre Mission</h2>
        <p class="section-subtitle">
            Fournir des solutions technologiques innovantes et sur mesure
        </p>

        <div style="max-width: 800px; margin: 0 auto; line-height: 1.8; color: var(--color-gray-700);">
            <p style="margin-bottom: 1.5rem;">
                <strong>Solideo Digital</strong> est votre partenaire de confiance pour tous vos besoins en développement
                et technologie. Nous combinons expertise technique et approche personnalisée pour offrir des solutions
                qui dépassent vos attentes.
            </p>

            <p style="margin-bottom: 1.5rem;">
                Notre équipe maîtrise les technologies les plus récentes en développement web, incluant Laravel (PHP),
                WebAssembly (C#), et Spring Boot (Java). Nous créons des applications web robustes, performantes et
                évolutives adaptées à vos besoins spécifiques.
            </p>

            <p style="margin-bottom: 1.5rem;">
                Au-delà du développement web, nous proposons également du montage de PC sur mesure et des services de
                dépannage informatique. Que vous ayez besoin d'une station de travail puissante ou d'une configuration
                gaming optimale, nous configurons votre PC selon vos exigences.
            </p>

            <p>
                Enfin, nous offrons des micro-formations et de l'assistance technique pour vous accompagner dans vos
                projets et vous aider à maîtriser les technologies que vous utilisez.
            </p>
        </div>
    </div>
</section>

<section class="section" style="background-color: var(--color-gray-50);">
    <div class="section-container">
        <h2 class="section-title">Nos Valeurs</h2>

        <div class="services-grid">
            <div class="service-card">
                <div class="service-icon">⚡</div>
                <h3 class="service-title">Excellence</h3>
                <p class="service-description">
                    Nous visons l'excellence dans chaque projet, en utilisant les meilleures pratiques
                    et les technologies les plus adaptées.
                </p>
            </div>

            <div class="service-card">
                <div class="service-icon">🤝</div>
                <h3 class="service-title">Proximité</h3>
                <p class="service-description">
                    Une approche personnalisée et un accompagnement sur mesure pour chaque client.
                </p>
            </div>

            <div class="service-card">
                <div class="service-icon">🚀</div>
                <h3 class="service-title">Innovation</h3>
                <p class="service-description">
                    Nous restons à la pointe de la technologie pour vous offrir des solutions modernes et performantes.
                </p>
            </div>
        </div>
    </div>
</section>

<section class="section" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); color: white;">
    <div class="section-container" style="text-align: center;">
        <h2 class="section-title" style="color: white;">Travaillons Ensemble</h2>
        <p class="section-subtitle" style="color: var(--color-beige);">
            Contactez-nous pour discuter de votre projet
        </p>
        <div style="display: flex; gap: 1rem; justify-content: center; margin-top: 2rem;">
            <a href="{{ route('contact') }}" class="btn btn-primary">Nous contacter</a>
        </div>
    </div>
</section>
@endsection
