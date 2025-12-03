@extends('layouts.app')

@section('title', 'Portfolio - Solideo Digital')
@section('description', 'Découvrez nos projets de développement web et nos réalisations')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 6rem 0 4rem;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white;">Notre Portfolio</h1>
        <p class="hero-subtitle" style="color: var(--color-beige);">
            Découvrez nos réalisations et projets récents
        </p>
    </div>
</section>

<!-- Filter Section -->
<section class="section" style="padding: 2rem 0;">
    <div class="section-container">
        <div style="text-align: center; margin-bottom: 2rem;">
            <a href="{{ route('projects') }}"
               class="btn {{ !request('category') ? 'btn-primary' : 'btn-secondary' }}"
               style="margin: 0.5rem;">
                Tous
            </a>
            @foreach($categories as $cat)
            <a href="{{ route('projects', ['category' => $cat]) }}"
               class="btn {{ request('category') == $cat ? 'btn-primary' : 'btn-secondary' }}"
               style="margin: 0.5rem;">
                {{ ucfirst($cat) }}
            </a>
            @endforeach
        </div>
    </div>
</section>

<!-- Projects Grid -->
<section class="section" style="padding-top: 0;">
    <div class="section-container">
        <div class="services-grid">
            @forelse($projects as $project)
            <div class="service-card">
                @if($project->image)
                <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                     style="width: 100%; height: 200px; object-fit: cover; border-radius: var(--border-radius-md); margin-bottom: 1rem;">
                @else
                <div style="width: 100%; height: 200px; background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-gold) 100%); border-radius: var(--border-radius-md); margin-bottom: 1rem; display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                    💼
                </div>
                @endif

                @if($project->category)
                <span style="display: inline-block; background: var(--color-gold); color: white; padding: 0.25rem 0.75rem; border-radius: var(--border-radius-sm); font-size: 0.85rem; margin-bottom: 0.5rem;">
                    {{ ucfirst($project->category) }}
                </span>
                @endif

                <h3 class="service-title">{{ $project->title }}</h3>
                <p class="service-description">{{ Str::limit($project->description, 120) }}</p>

                @if($project->technologies)
                <div style="margin-top: 1rem; display: flex; flex-wrap: wrap; gap: 0.5rem;">
                    @foreach(explode(',', $project->technologies) as $tech)
                    <span style="background: var(--color-gray-100); color: var(--color-gray-700); padding: 0.25rem 0.5rem; border-radius: var(--border-radius-sm); font-size: 0.75rem;">
                        {{ trim($tech) }}
                    </span>
                    @endforeach
                </div>
                @endif

                <a href="{{ route('projects.show', $project->slug) }}" style="color: var(--color-gold); font-weight: 600; text-decoration: none; margin-top: 1rem; display: inline-block;">Voir le projet →</a>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                <p style="color: var(--color-gray-600); font-size: 1.1rem;">Aucun projet disponible pour le moment.</p>
            </div>
            @endforelse
        </div>

        @if($projects->hasPages())
        <div style="margin-top: 3rem;">
            {{ $projects->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
