@extends('layouts.app')

@section('title', 'Témoignages - Solideo Digital')
@section('description', 'Découvrez les avis et témoignages de nos clients satisfaits sur nos services de développement web, montage PC et formations.')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 8rem 0 4rem; position: relative; overflow: hidden;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 3.5rem; margin-bottom: 1.5rem;">Témoignages</h1>
        <p class="hero-subtitle" style="color: rgba(255,255,255,0.9); font-size: 1.3rem; font-weight: 300; margin-bottom: 2rem;">Ce que nos clients disent de nous</p>
        <a href="{{ route('testimonials.create') }}" class="btn btn-primary" style="text-decoration: none; display: inline-flex; align-items: center; gap: 0.5rem; background: var(--color-gold); color: white; padding: 1rem 2rem; font-size: 1.1rem;">
            <span style="font-size: 1.5rem;">✍️</span>
            <span>Laisser un témoignage</span>
        </a>
    </div>
</section>

<!-- Success Message -->
@if(session('success'))
<section class="section" style="padding: 2rem 0 0;">
    <div class="section-container" style="max-width: 800px;">
        <div style="background: linear-gradient(135deg, #d1fae5 0%, #a7f3d0 100%); color: #065f46; padding: 1.5rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md); text-align: center; border-left: 4px solid #10b981;">
            <div style="font-size: 3rem; margin-bottom: 0.5rem;">✅</div>
            <p style="font-weight: 600; font-size: 1.1rem; margin-bottom: 0.5rem;">{{ session('success') }}</p>
            <p style="font-size: 0.95rem; opacity: 0.9;">Nous vous remercions pour votre confiance !</p>
        </div>
    </div>
</section>
@endif

<!-- Filters Section -->
<section class="section" style="padding: 2rem 0 1rem;">
    <div class="section-container">
        <form method="GET" action="{{ route('testimonials') }}" style="display: flex; gap: 1rem; flex-wrap: wrap; justify-content: center; align-items: center;">
            <!-- Rating Filter -->
            <div>
                <label style="font-size: 0.9rem; color: var(--color-gray-600); display: block; margin-bottom: 0.5rem;">Note</label>
                <select name="rating" onchange="this.form.submit()" style="padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; background: white; cursor: pointer;">
                    <option value="">Toutes les notes</option>
                    <option value="5" {{ request('rating') == '5' ? 'selected' : '' }}>5 ★★★★★</option>
                    <option value="4" {{ request('rating') == '4' ? 'selected' : '' }}>4 ★★★★☆</option>
                    <option value="3" {{ request('rating') == '3' ? 'selected' : '' }}>3 ★★★☆☆</option>
                    <option value="2" {{ request('rating') == '2' ? 'selected' : '' }}>2 ★★☆☆☆</option>
                    <option value="1" {{ request('rating') == '1' ? 'selected' : '' }}>1 ★☆☆☆☆</option>
                </select>
            </div>

            <!-- Project Type Filter -->
            <div>
                <label style="font-size: 0.9rem; color: var(--color-gray-600); display: block; margin-bottom: 0.5rem;">Type de projet</label>
                <select name="project_type" onchange="this.form.submit()" style="padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; background: white; cursor: pointer;">
                    <option value="">Tous les projets</option>
                    @foreach($projectTypes as $type)
                        <option value="{{ $type }}" {{ request('project_type') == $type ? 'selected' : '' }}>{{ $type }}</option>
                    @endforeach
                </select>
            </div>

            @if(request('rating') || request('project_type'))
            <div style="align-self: flex-end;">
                <a href="{{ route('testimonials') }}" class="btn btn-secondary" style="text-decoration: none; display: inline-block; padding: 0.75rem 1.5rem;">Réinitialiser</a>
            </div>
            @endif
        </form>
    </div>
</section>

<!-- Testimonials Grid -->
<section class="section" style="padding: 2rem 0 4rem;">
    <div class="section-container">
        @if($testimonials->count() > 0)
        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 2rem; margin-bottom: 3rem;">
            @foreach($testimonials as $testimonial)
            <div class="card" style="background: white; border-radius: var(--border-radius-lg); padding: 2rem; box-shadow: var(--shadow-md); transition: var(--transition-normal); position: relative; border-left: 4px solid {{ $testimonial->is_featured ? 'var(--color-gold)' : 'var(--color-navy)' }};">
                <!-- Quote Icon -->
                <div style="position: absolute; top: -10px; right: 20px; font-size: 3rem; color: var(--color-gray-200); line-height: 1;">"</div>

                <!-- Stars -->
                <div style="margin-bottom: 1rem;">
                    @for($i = 1; $i <= 5; $i++)
                        @if($i <= $testimonial->rating)
                            <span style="color: var(--color-gold); font-size: 1.25rem;">★</span>
                        @else
                            <span style="color: var(--color-gray-300); font-size: 1.25rem;">★</span>
                        @endif
                    @endfor
                </div>

                <!-- Testimonial Text -->
                <p style="color: var(--color-gray-700); line-height: 1.8; font-size: 1rem; margin-bottom: 1.5rem; font-style: italic;">
                    "{{ $testimonial->testimonial }}"
                </p>

                <!-- Client Info -->
                <div style="border-top: 1px solid var(--color-gray-200); padding-top: 1rem;">
                    <p style="font-weight: 600; color: var(--color-navy); margin-bottom: 0.25rem;">
                        {{ $testimonial->client_name }}
                    </p>
                    @if($testimonial->client_position || $testimonial->client_company)
                    <p style="font-size: 0.9rem; color: var(--color-gray-600);">
                        @if($testimonial->client_position)
                            {{ $testimonial->client_position }}
                        @endif
                        @if($testimonial->client_position && $testimonial->client_company)
                            ,
                        @endif
                        @if($testimonial->client_company)
                            {{ $testimonial->client_company }}
                        @endif
                    </p>
                    @endif
                    @if($testimonial->project_type)
                    <p style="font-size: 0.85rem; color: var(--color-gold); font-weight: 500; margin-top: 0.5rem;">
                        📁 {{ $testimonial->project_type }}
                    </p>
                    @endif
                </div>

                @if($testimonial->is_featured)
                <div style="position: absolute; top: 1rem; right: 1rem; background: var(--color-gold); color: white; padding: 0.25rem 0.75rem; border-radius: var(--border-radius-sm); font-size: 0.75rem; font-weight: 600;">
                    ⭐ FEATURED
                </div>
                @endif
            </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div style="display: flex; justify-content: center; margin-top: 2rem;">
            {{ $testimonials->links() }}
        </div>
        @else
        <!-- No Testimonials Message -->
        <div style="text-align: center; padding: 4rem 2rem;">
            <div style="font-size: 4rem; margin-bottom: 1rem;">💬</div>
            <h2 style="color: var(--color-navy); margin-bottom: 1rem;">Aucun témoignage trouvé</h2>
            <p style="color: var(--color-gray-600);">
                @if(request('rating') || request('project_type'))
                    Essayez de modifier vos filtres pour voir plus de témoignages.
                @else
                    Nous travaillons à collecter les avis de nos clients satisfaits.
                @endif
            </p>
            @if(request('rating') || request('project_type'))
            <a href="{{ route('testimonials') }}" class="btn btn-primary" style="margin-top: 1.5rem; display: inline-block; text-decoration: none;">Voir tous les témoignages</a>
            @endif
        </div>
        @endif
    </div>
</section>

<!-- CTA Section -->
<section class="section" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 4rem 0;">
    <div class="section-container" style="text-align: center;">
        <h2 style="color: white; font-size: 2.5rem; margin-bottom: 1rem;">Vous aussi, rejoignez nos clients satisfaits</h2>
        <p style="color: rgba(255,255,255,0.9); font-size: 1.2rem; margin-bottom: 2rem;">Discutons de votre projet ensemble</p>
        <a href="{{ route('contact') }}" class="btn btn-primary" style="text-decoration: none; background: var(--color-gold); color: white; padding: 1rem 2.5rem; font-size: 1.1rem;">Nous contacter</a>
    </div>
</section>

@push('styles')
<style>
.card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-xl);
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem !important;
    }

    .hero-subtitle {
        font-size: 1.1rem !important;
    }
}
</style>
@endpush
@endsection
