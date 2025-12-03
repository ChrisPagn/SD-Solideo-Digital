@extends('layouts.app')

@section('title', $project->title . ' - Solideo Digital')
@section('description', Str::limit($project->description, 155))

@section('content')
<!-- Project Header -->
<section class="section" style="padding-top: 6rem;">
    <div class="section-container">
        <div style="max-width: 1000px; margin: 0 auto;">
            <!-- Breadcrumb -->
            <nav style="margin-bottom: 2rem; color: var(--color-gray-600);">
                <a href="{{ route('projects') }}" style="color: var(--color-gold); text-decoration: none;">Portfolio</a>
                <span style="margin: 0 0.5rem;">/</span>
                <span>{{ $project->title }}</span>
            </nav>

            <!-- Project Image -->
            @if($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                 style="width: 100%; height: 400px; object-fit: cover; border-radius: var(--border-radius-lg); margin-bottom: 2rem;">
            @endif

            <!-- Project Info -->
            <div style="background: white; padding: 3rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md);">
                @if($project->category)
                <span style="display: inline-block; background: var(--color-gold); color: white; padding: 0.5rem 1rem; border-radius: var(--border-radius-sm); font-size: 0.9rem; margin-bottom: 1rem;">
                    {{ ucfirst($project->category) }}
                </span>
                @endif

                <h1 style="color: var(--color-navy); font-size: 2.5rem; margin-bottom: 1rem;">{{ $project->title }}</h1>

                @if($project->client)
                <p style="color: var(--color-gray-600); font-size: 1.1rem; margin-bottom: 2rem;">
                    <strong>Client:</strong> {{ $project->client }}
                </p>
                @endif

                <div style="color: var(--color-gray-700); line-height: 1.8; font-size: 1.1rem; margin-bottom: 2rem;">
                    {!! nl2br(e($project->description)) !!}
                </div>

                @if($project->technologies)
                <div style="margin-top: 2rem; padding: 2rem; background: var(--color-gray-50); border-radius: var(--border-radius-md);">
                    <h3 style="color: var(--color-navy); margin-bottom: 1rem;">Technologies utilisées</h3>
                    <div style="display: flex; flex-wrap: wrap; gap: 0.75rem;">
                        @foreach(explode(',', $project->technologies) as $tech)
                        <span style="background: white; color: var(--color-gray-700); padding: 0.5rem 1rem; border-radius: var(--border-radius-sm); font-size: 0.9rem; box-shadow: var(--shadow-sm);">
                            {{ trim($tech) }}
                        </span>
                        @endforeach
                    </div>
                </div>
                @endif

                @if($project->project_url)
                <div style="margin-top: 2rem;">
                    <a href="{{ $project->project_url }}" target="_blank" rel="noopener" class="btn btn-primary">
                        Visiter le projet →
                    </a>
                </div>
                @endif
            </div>
        </div>
    </div>
</section>

<!-- Related Projects -->
@if($relatedProjects->count() > 0)
<section class="section" style="background: var(--color-gray-50);">
    <div class="section-container">
        <h2 class="section-title">Projets similaires</h2>
        <div class="services-grid">
            @foreach($relatedProjects as $related)
            <div class="service-card">
                @if($related->image)
                <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}"
                     style="width: 100%; height: 200px; object-fit: cover; border-radius: var(--border-radius-md); margin-bottom: 1rem;">
                @endif
                <h3 class="service-title">{{ $related->title }}</h3>
                <p class="service-description">{{ Str::limit($related->description, 100) }}</p>
                <a href="{{ route('projects.show', $related->slug) }}" style="color: var(--color-gold); font-weight: 600; text-decoration: none;">Voir le projet →</a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
