@extends('layouts.app')

@section('title', 'Blog - Solideo Digital')
@section('description', 'Actualités, conseils et tutoriels sur le développement web et les technologies')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 6rem 0 4rem;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white;">Blog & Actualités</h1>
        <p class="hero-subtitle" style="color: var(--color-beige);">
            Conseils, tutoriels et actualités tech
        </p>
    </div>
</section>

<!-- Featured Post -->
@if($featuredPost)
<section class="section">
    <div class="section-container">
        <h2 class="section-title">Article à la une</h2>
        <div style="background: white; border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-lg); display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
            @if($featuredPost->image)
            <img src="{{ asset('storage/' . $featuredPost->image) }}" alt="{{ $featuredPost->title }}"
                 style="width: 100%; height: 100%; object-fit: cover;">
            @else
            <div style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-gold) 100%); display: flex; align-items: center; justify-content: center; font-size: 5rem;">
                📝
            </div>
            @endif
            <div style="padding: 3rem;">
                <span style="color: var(--color-gold); font-size: 0.9rem; font-weight: 600;">ARTICLE VEDETTE</span>
                <h2 style="color: var(--color-navy); font-size: 2rem; margin: 1rem 0;">{{ $featuredPost->title }}</h2>
                <p style="color: var(--color-gray-600); margin-bottom: 1rem;">
                    {{ \Carbon\Carbon::parse($featuredPost->published_at)->format('d M Y') }}
                </p>
                <p style="color: var(--color-gray-700); line-height: 1.6; margin-bottom: 2rem;">
                    {{ Str::limit($featuredPost->excerpt, 200) }}
                </p>
                <a href="{{ route('blog.show', $featuredPost->slug) }}" class="btn btn-primary">Lire l'article</a>
            </div>
        </div>
    </div>
</section>
@endif

<!-- Blog Posts Grid -->
<section class="section" style="background: var(--color-gray-50);">
    <div class="section-container">
        <h2 class="section-title">Tous les articles</h2>
        <div class="services-grid">
            @forelse($posts as $post)
            <div class="service-card">
                @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                     style="width: 100%; height: 200px; object-fit: cover; border-radius: var(--border-radius-md); margin-bottom: 1rem;">
                @else
                <div style="width: 100%; height: 200px; background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-gold) 100%); border-radius: var(--border-radius-md); margin-bottom: 1rem; display: flex; align-items: center; justify-content: center; color: white; font-size: 3rem;">
                    📝
                </div>
                @endif

                <p style="color: var(--color-gray-600); font-size: 0.85rem; margin-bottom: 0.5rem;">
                    {{ \Carbon\Carbon::parse($post->published_at)->format('d M Y') }}
                </p>

                <h3 class="service-title">{{ $post->title }}</h3>
                <p class="service-description">{{ Str::limit($post->excerpt, 120) }}</p>
                <a href="{{ route('blog.show', $post->slug) }}" style="color: var(--color-gold); font-weight: 600; text-decoration: none; margin-top: 1rem; display: inline-block;">Lire la suite →</a>
            </div>
            @empty
            <div style="grid-column: 1 / -1; text-align: center; padding: 3rem;">
                <p style="color: var(--color-gray-600); font-size: 1.1rem;">Aucun article disponible pour le moment.</p>
            </div>
            @endforelse
        </div>

        @if($posts->hasPages())
        <div style="margin-top: 3rem;">
            {{ $posts->links() }}
        </div>
        @endif
    </div>
</section>
@endsection
