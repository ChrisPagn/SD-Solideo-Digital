@extends('layouts.app')

@section('title', 'Modifier Rendez-vous - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 8rem 0 4rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Modifier Rendez-vous</h1>
    </div>
</section>

<section class="section">
    <div class="section-container">
        <div style="max-width: 800px; margin: 0 auto;">
            @if ($errors->any())
            <div style="background: #ef4444; color: white; padding: 1rem; border-radius: var(--border-radius-md); margin-bottom: 2rem;">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div style="background: white; padding: 3rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md); margin-bottom: 2rem;">
                <h3 style="color: var(--color-navy); margin-bottom: 1.5rem;">Informations du rendez-vous</h3>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                    <div>
                        <strong>Nom:</strong> {{ $appointment->name }}
                    </div>
                    <div>
                        <strong>Email:</strong> {{ $appointment->email }}
                    </div>
                    <div>
                        <strong>Téléphone:</strong> {{ $appointment->phone }}
                    </div>
                    <div>
                        <strong>Service:</strong> {{ $appointment->service_type }}
                    </div>
                    <div>
                        <strong>Date souhaitée:</strong> {{ $appointment->preferred_date->format('d/m/Y') }}
                    </div>
                    <div>
                        <strong>Heure souhaitée:</strong> {{ $appointment->preferred_time }}
                    </div>
                </div>

                @if($appointment->message)
                <div style="margin-bottom: 1.5rem;">
                    <strong>Message:</strong>
                    <p style="margin-top: 0.5rem; color: var(--color-gray-700);">{{ $appointment->message }}</p>
                </div>
                @endif
            </div>

            <div style="background: white; padding: 3rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md);">
                <form method="POST" action="{{ route('admin.appointments.update', $appointment) }}">
                    @csrf
                    @method('PUT')

                    <div style="margin-bottom: 1.5rem;">
                        <label for="status" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Statut *
                        </label>
                        <select id="status" name="status" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                            <option value="pending" {{ $appointment->status == 'pending' ? 'selected' : '' }}>En attente</option>
                            <option value="confirmed" {{ $appointment->status == 'confirmed' ? 'selected' : '' }}>Confirmé</option>
                            <option value="completed" {{ $appointment->status == 'completed' ? 'selected' : '' }}>Terminé</option>
                            <option value="cancelled" {{ $appointment->status == 'cancelled' ? 'selected' : '' }}>Annulé</option>
                        </select>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="admin_notes" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Notes administratives
                        </label>
                        <textarea id="admin_notes" name="admin_notes" rows="5"
                                  style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">{{ old('admin_notes', $appointment->admin_notes) }}</textarea>
                    </div>

                    <div style="display: flex; justify-content: space-between; margin-top: 2rem;">
                        <a href="{{ route('admin.appointments.index') }}" style="color: var(--color-navy); text-decoration: none;">
                            ← Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Mettre à jour
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
