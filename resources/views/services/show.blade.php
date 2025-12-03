@extends('layouts.app')

@section('title', $service->name . ' - Solideo Digital')
@section('description', $service->short_description)

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 6rem 0 4rem;">
    <div class="hero-container">
        @if($service->icon)
        <div style="font-size: 4rem; margin-bottom: 1rem;">{{ $service->icon }}</div>
        @endif
        <h1 class="hero-title" style="color: white;">{{ $service->name }}</h1>
        <p class="hero-subtitle" style="color: var(--color-beige);">
            {{ $service->short_description }}
        </p>
    </div>
</section>

<!-- Service Details -->
<section class="section">
    <div class="section-container">
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="background: white; padding: 3rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md);">
                <h2 style="color: var(--color-navy); margin-bottom: 2rem;">Description complète</h2>
                <div style="color: var(--color-gray-700); line-height: 1.8; font-size: 1.1rem;">
                    {!! nl2br(e($service->description)) !!}
                </div>

                @if($service->price)
                <div style="margin-top: 3rem; padding: 2rem; background: var(--color-gray-50); border-radius: var(--border-radius-md); border-left: 4px solid var(--color-gold);">
                    <h3 style="color: var(--color-navy); margin-bottom: 0.5rem;">Tarif</h3>
                    <p style="color: var(--color-gray-700); font-size: 1.1rem;">{!! nl2br(e($service->price)) !!}</p>
                </div>
                @endif
            </div>

            <div style="text-align: center; margin-top: 3rem;">
                <a href="{{ route('contact') }}" class="btn btn-primary" style="margin-right: 1rem;">Demander un devis</a>
                <a href="{{ route('services') }}" class="btn btn-secondary">Retour aux services</a>
            </div>
        </div>
    </div>
</section>
@endsection
