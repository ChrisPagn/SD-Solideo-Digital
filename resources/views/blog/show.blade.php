@extends('layouts.app')

@section('title', $post->title . ' - Blog Solideo Digital')
@section('description', Str::limit($post->excerpt, 155))

@section('content')
<!-- Article Header -->
<section class="section" style="padding-top: 6rem;">
    <div class="section-container">
        <article style="max-width: 800px; margin: 0 auto;">
            <!-- Breadcrumb -->
            <nav style="margin-bottom: 2rem; color: var(--color-gray-600);">
                <a href="{{ route('blog') }}" style="color: var(--color-gold); text-decoration: none;">Blog</a>
                <span style="margin: 0 0.5rem;">/</span>
                <span>{{ $post->title }}</span>
            </nav>

            <!-- Article Meta -->
            <div style="margin-bottom: 2rem;">
                <p style="color: var(--color-gray-600); margin-bottom: 0.5rem;">
                    Publié le {{ \Carbon\Carbon::parse($post->published_at)->format('d M Y') }}
                </p>
            </div>

            <!-- Article Title -->
            <h1 style="color: var(--color-navy); font-size: 2.5rem; line-height: 1.2; margin-bottom: 1.5rem;">
                {{ $post->title }}
            </h1>

            <!-- Article Excerpt -->
            @if($post->excerpt)
            <div style="font-size: 1.2rem; color: var(--color-gray-700); font-weight: 500; margin-bottom: 2rem; padding-left: 1.5rem; border-left: 4px solid var(--color-gold);">
                {{ $post->excerpt }}
            </div>
            @endif

            <!-- Article Image -->
            @if($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}"
                 style="width: 100%; height: 400px; object-fit: cover; border-radius: var(--border-radius-lg); margin-bottom: 2rem;">
            @endif

            <!-- Article Content -->
            <div style="background: white; padding: 3rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md);">
                <div style="color: var(--color-gray-700); line-height: 1.8; font-size: 1.1rem;">
                    {!! nl2br(e($post->content)) !!}
                </div>
            </div>

            <!-- Share Section -->
            <div style="margin-top: 3rem; padding: 2rem; background: var(--color-gray-50); border-radius: var(--border-radius-md); text-align: center;">
                <p style="color: var(--color-gray-600); margin-bottom: 1rem;">Partager cet article</p>
                <div style="display: flex; gap: 1rem; justify-content: center;">
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blog.show', $post->slug)) }}"
                       target="_blank"
                       style="background: var(--color-navy); color: white; padding: 0.75rem 1.5rem; border-radius: var(--border-radius-md); text-decoration: none;">
                        Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('blog.show', $post->slug)) }}&text={{ urlencode($post->title) }}"
                       target="_blank"
                       style="background: var(--color-navy); color: white; padding: 0.75rem 1.5rem; border-radius: var(--border-radius-md); text-decoration: none;">
                        Twitter
                    </a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(route('blog.show', $post->slug)) }}"
                       target="_blank"
                       style="background: var(--color-navy); color: white; padding: 0.75rem 1.5rem; border-radius: var(--border-radius-md); text-decoration: none;">
                        LinkedIn
                    </a>
                </div>
            </div>
        </article>
    </div>
</section>

<!-- Related Posts -->
@if($relatedPosts->count() > 0)
<section class="section" style="background: var(--color-gray-50);">
    <div class="section-container">
        <h2 class="section-title">Articles similaires</h2>
        <div class="services-grid">
            @foreach($relatedPosts as $related)
            <div class="service-card">
                @if($related->image)
                <img src="{{ asset('storage/' . $related->image) }}" alt="{{ $related->title }}"
                     style="width: 100%; height: 200px; object-fit: cover; border-radius: var(--border-radius-md); margin-bottom: 1rem;">
                @endif
                <p style="color: var(--color-gray-600); font-size: 0.85rem; margin-bottom: 0.5rem;">
                    {{ \Carbon\Carbon::parse($related->published_at)->format('d M Y') }}
                </p>
                <h3 class="service-title">{{ $related->title }}</h3>
                <p class="service-description">{{ Str::limit($related->excerpt, 100) }}</p>
                <a href="{{ route('blog.show', $related->slug) }}" style="color: var(--color-gold); font-weight: 600; text-decoration: none;">Lire la suite →</a>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endif
@endsection
