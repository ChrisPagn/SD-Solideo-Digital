@extends('layouts.app')

@section('title', 'Gestion des Rendez-vous - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 8rem 0 4rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Gestion des Rendez-vous</h1>
    </div>
</section>

<section class="section">
    <div class="section-container">
        <div style="margin-bottom: 2rem;">
            <h2 class="section-title">Liste des rendez-vous</h2>
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
                        <th style="padding: 1rem; text-align: left;">Nom</th>
                        <th style="padding: 1rem; text-align: left;">Service</th>
                        <th style="padding: 1rem; text-align: left;">Date</th>
                        <th style="padding: 1rem; text-align: center;">Statut</th>
                        <th style="padding: 1rem; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($appointments as $appointment)
                    <tr style="border-bottom: 1px solid var(--color-gray-200);">
                        <td style="padding: 1rem;">{{ $appointment->name }}</td>
                        <td style="padding: 1rem;">{{ $appointment->service_type }}</td>
                        <td style="padding: 1rem;">{{ $appointment->preferred_date->format('d/m/Y') }} - {{ $appointment->preferred_time }}</td>
                        <td style="padding: 1rem; text-align: center;">
                            <span style="background: {{ $appointment->status == 'pending' ? '#f59e0b' : ($appointment->status == 'confirmed' ? '#3b82f6' : ($appointment->status == 'completed' ? '#10b981' : '#ef4444')) }}; color: white; padding: 0.25rem 0.75rem; border-radius: var(--border-radius-sm); font-size: 0.85rem;">
                                {{ ucfirst($appointment->status) }}
                            </span>
                        </td>
                        <td style="padding: 1rem; text-align: right;">
                            <a href="{{ route('admin.appointments.edit', $appointment) }}" style="color: var(--color-gold); text-decoration: none; margin-right: 1rem;">Modifier</a>
                            <form method="POST" action="{{ route('admin.appointments.destroy', $appointment) }}" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-family: inherit; font-size: inherit;">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="padding: 2rem; text-align: center; color: var(--color-gray-500);">
                            Aucun rendez-vous trouvé
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 2rem;">
            {{ $appointments->links() }}
        </div>
    </div>
</section>
@endsection
