@extends('layouts.app')

@section('title', 'Dashboard Admin - Solideo Digital')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 8rem 0 4rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Dashboard Admin</h1>
        <p class="hero-subtitle" style="color: var(--color-beige);">
            Bienvenue, {{ auth()->user()->name }}
        </p>
    </div>
</section>

<!-- Stats Section -->
<section class="section">
    <div class="section-container">
        <h2 class="section-title">Statistiques</h2>

        <div class="services-grid">
            <div class="service-card" style="text-align: center;">
                <div style="font-size: 3rem; color: var(--color-gold); margin-bottom: 1rem;">{{ $stats['services'] }}</div>
                <h3 style="color: var(--color-navy); margin-bottom: 0.5rem;">Services</h3>
                <a href="{{ route('admin.services.index') }}" style="color: var(--color-gold); text-decoration: none;">Gérer →</a>
            </div>

            <div class="service-card" style="text-align: center;">
                <div style="font-size: 3rem; color: var(--color-gold); margin-bottom: 1rem;">{{ $stats['projects'] }}</div>
                <h3 style="color: var(--color-navy); margin-bottom: 0.5rem;">Projets</h3>
                <a href="{{ route('admin.projects.index') }}" style="color: var(--color-gold); text-decoration: none;">Gérer →</a>
            </div>

            <div class="service-card" style="text-align: center;">
                <div style="font-size: 3rem; color: var(--color-gold); margin-bottom: 1rem;">{{ $stats['blog_posts'] }}</div>
                <h3 style="color: var(--color-navy); margin-bottom: 0.5rem;">Articles</h3>
                <a href="{{ route('admin.blog.index') }}" style="color: var(--color-gold); text-decoration: none;">Gérer →</a>
            </div>

            <div class="service-card" style="text-align: center;">
                <div style="font-size: 3rem; color: var(--color-gold); margin-bottom: 1rem;">{{ $stats['testimonials'] }}</div>
                <h3 style="color: var(--color-navy); margin-bottom: 0.5rem;">Témoignages</h3>
                <a href="{{ route('admin.testimonials.index') }}" style="color: var(--color-gold); text-decoration: none;">Gérer →</a>
            </div>

            <div class="service-card" style="text-align: center;">
                <div style="font-size: 3rem; color: var(--color-gold); margin-bottom: 1rem;">{{ $stats['contacts'] }}</div>
                <h3 style="color: var(--color-navy); margin-bottom: 0.5rem;">Contacts</h3>
                <a href="{{ route('admin.contacts.index') }}" style="color: var(--color-gold); text-decoration: none;">Voir →</a>
            </div>

            <div class="service-card" style="text-align: center;">
                <div style="font-size: 3rem; color: var(--color-gold); margin-bottom: 1rem;">
                    {{ $stats['appointments'] }}
                    @if($stats['pending_appointments'] > 0)
                    <span style="font-size: 1.2rem; color: #ef4444;">({{ $stats['pending_appointments'] }} en attente)</span>
                    @endif
                </div>
                <h3 style="color: var(--color-navy); margin-bottom: 0.5rem;">Rendez-vous</h3>
                <a href="{{ route('admin.appointments.index') }}" style="color: var(--color-gold); text-decoration: none;">Gérer →</a>
            </div>
        </div>
    </div>
</section>

<!-- Recent Contacts -->
@if($recentContacts->count() > 0)
<section class="section" style="background: var(--color-gray-50);">
    <div class="section-container">
        <h2 class="section-title">Messages récents</h2>

        <div style="background: white; border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-md);">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: var(--color-navy); color: white;">
                    <tr>
                        <th style="padding: 1rem; text-align: left;">Nom</th>
                        <th style="padding: 1rem; text-align: left;">Email</th>
                        <th style="padding: 1rem; text-align: left;">Sujet</th>
                        <th style="padding: 1rem; text-align: left;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentContacts as $contact)
                    <tr style="border-bottom: 1px solid var(--color-gray-200);">
                        <td style="padding: 1rem;">{{ $contact->name }}</td>
                        <td style="padding: 1rem;">{{ $contact->email }}</td>
                        <td style="padding: 1rem;">{{ $contact->subject }}</td>
                        <td style="padding: 1rem;">{{ $contact->created_at->diffForHumans() }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endif

<!-- Recent Appointments -->
@if($recentAppointments->count() > 0)
<section class="section">
    <div class="section-container">
        <h2 class="section-title">Rendez-vous récents</h2>

        <div style="background: white; border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-md);">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: var(--color-navy); color: white;">
                    <tr>
                        <th style="padding: 1rem; text-align: left;">Nom</th>
                        <th style="padding: 1rem; text-align: left;">Service</th>
                        <th style="padding: 1rem; text-align: left;">Date souhaitée</th>
                        <th style="padding: 1rem; text-align: left;">Statut</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentAppointments as $appointment)
                    <tr style="border-bottom: 1px solid var(--color-gray-200);">
                        <td style="padding: 1rem;">{{ $appointment->name }}</td>
                        <td style="padding: 1rem;">{{ $appointment->service_type }}</td>
                        <td style="padding: 1rem;">{{ \Carbon\Carbon::parse($appointment->preferred_date)->format('d/m/Y') }} - {{ $appointment->preferred_time }}</td>
                        <td style="padding: 1rem;">
                            <span style="background: {{ $appointment->status == 'pending' ? '#f59e0b' : '#10b981' }}; color: white; padding: 0.25rem 0.75rem; border-radius: var(--border-radius-sm); font-size: 0.85rem;">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>
@endif

<!-- Quick Actions -->
<section class="section" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); color: white;">
    <div class="section-container">
        <h2 class="section-title" style="color: white;">Actions rapides</h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem; margin-top: 2rem;">
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">+ Nouveau service</a>
            <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">+ Nouveau projet</a>
            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">+ Nouvel article</a>
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">+ Nouveau témoignage</a>
        </div>
    </div>
</section>
@endsection
