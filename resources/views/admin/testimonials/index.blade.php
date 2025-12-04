@extends('layouts.admin')

@section('title', 'Gestion des Témoignages - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 8rem 0 4rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Gestion des Témoignages</h1>
    </div>
</section>

<section class="section">
    <div class="section-container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
            <div>
                <h2 class="section-title" style="margin-bottom: 0.5rem;">Liste des témoignages</h2>
                @php
                    $pendingCount = \App\Models\Testimonial::where('is_active', false)->count();
                @endphp
                @if($pendingCount > 0)
                <p style="color: var(--color-gray-600); font-size: 0.95rem;">
                    <span style="background: #fef3c7; color: #92400e; padding: 0.25rem 0.75rem; border-radius: var(--border-radius-sm); font-weight: 600;">
                        {{ $pendingCount }} en attente de validation
                    </span>
                </p>
                @endif
            </div>
            <a href="{{ route('admin.testimonials.create') }}" class="btn btn-primary">+ Nouveau témoignage</a>
        </div>

        <!-- Filter Tabs -->
        <div style="display: flex; gap: 0.5rem; margin-bottom: 1.5rem; flex-wrap: wrap;">
            <a href="{{ route('admin.testimonials.index') }}" class="filter-tab {{ !request('filter') ? 'active' : '' }}" style="padding: 0.75rem 1.5rem; border-radius: var(--border-radius-md); text-decoration: none; font-weight: 600; transition: var(--transition-fast); {{ !request('filter') ? 'background: var(--color-navy); color: white;' : 'background: var(--color-gray-100); color: var(--color-gray-700);' }}">
                Tous ({{ \App\Models\Testimonial::count() }})
            </a>
            <a href="{{ route('admin.testimonials.index', ['filter' => 'pending']) }}" class="filter-tab {{ request('filter') == 'pending' ? 'active' : '' }}" style="padding: 0.75rem 1.5rem; border-radius: var(--border-radius-md); text-decoration: none; font-weight: 600; transition: var(--transition-fast); {{ request('filter') == 'pending' ? 'background: #f59e0b; color: white;' : 'background: var(--color-gray-100); color: var(--color-gray-700);' }}">
                ⏳ En attente ({{ $pendingCount }})
            </a>
            <a href="{{ route('admin.testimonials.index', ['filter' => 'active']) }}" class="filter-tab {{ request('filter') == 'active' ? 'active' : '' }}" style="padding: 0.75rem 1.5rem; border-radius: var(--border-radius-md); text-decoration: none; font-weight: 600; transition: var(--transition-fast); {{ request('filter') == 'active' ? 'background: #10b981; color: white;' : 'background: var(--color-gray-100); color: var(--color-gray-700);' }}">
                ✓ Actifs ({{ \App\Models\Testimonial::where('is_active', true)->count() }})
            </a>
        </div>

        @if(session('success'))
        <div style="background: #10b981; color: white; padding: 1rem; border-radius: var(--border-radius-md); margin-bottom: 2rem;">
            {{ session('success') }}
        </div>
        @endif

        <div style="background: white; border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-md);">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: var(--color-navy); color: white;">
                    <tr>
                        <th style="padding: 1rem; text-align: left;">Client</th>
                        <th style="padding: 1rem; text-align: center;">Note</th>
                        <th style="padding: 1rem; text-align: center;">Statut</th>
                        <th style="padding: 1rem; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($testimonials as $testimonial)
                    <tr style="border-bottom: 1px solid var(--color-gray-200);">
                        <td style="padding: 1rem;">{{ $testimonial->client_name }}</td>
                        <td style="padding: 1rem; text-align: center;">{{ $testimonial->rating }}/5</td>
                        <td style="padding: 1rem; text-align: center;">
                            <span style="background: {{ $testimonial->is_active ? '#10b981' : '#ef4444' }}; color: white; padding: 0.25rem 0.75rem; border-radius: var(--border-radius-sm); font-size: 0.85rem;">
                                {{ $testimonial->is_active ? 'Actif' : 'Inactif' }}
                            </span>
                        </td>
                        <td style="padding: 1rem; text-align: right;">
                            <a href="{{ route('admin.testimonials.edit', $testimonial) }}" style="color: var(--color-gold); text-decoration: none; margin-right: 1rem;">Modifier</a>
                            <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-family: inherit; font-size: inherit;">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="padding: 2rem; text-align: center; color: var(--color-gray-500);">
                            Aucun témoignage trouvé
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 2rem;">
            {{ $testimonials->links() }}
        </div>
    </div>
</section>
@endsection
