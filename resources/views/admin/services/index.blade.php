@extends('layouts.app')

@section('title', 'Gestion des Services - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 8rem 0 4rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Gestion des Services</h1>
        <p class="hero-subtitle" style="color: var(--color-beige);">
            Gérez tous vos services
        </p>
    </div>
</section>

<section class="section">
    <div class="section-container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 class="section-title">Liste des services</h2>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">+ Nouveau service</a>
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
                        <th style="padding: 1rem; text-align: left;">Prix</th>
                        <th style="padding: 1rem; text-align: center;">Ordre</th>
                        <th style="padding: 1rem; text-align: center;">Statut</th>
                        <th style="padding: 1rem; text-align: center;">En vedette</th>
                        <th style="padding: 1rem; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($services as $service)
                    <tr style="border-bottom: 1px solid var(--color-gray-200);">
                        <td style="padding: 1rem;">{{ $service->name }}</td>
                        <td style="padding: 1rem;">{{ $service->price ?? 'Sur devis' }}</td>
                        <td style="padding: 1rem; text-align: center;">{{ $service->order }}</td>
                        <td style="padding: 1rem; text-align: center;">
                            <span style="background: {{ $service->is_active ? '#10b981' : '#ef4444' }}; color: white; padding: 0.25rem 0.75rem; border-radius: var(--border-radius-sm); font-size: 0.85rem;">
                                {{ $service->is_active ? 'Actif' : 'Inactif' }}
                            </span>
                        </td>
                        <td style="padding: 1rem; text-align: center;">
                            @if($service->is_featured)
                            <span style="color: var(--color-gold);">★</span>
                            @endif
                        </td>
                        <td style="padding: 1rem; text-align: right;">
                            <a href="{{ route('admin.services.edit', $service) }}" style="color: var(--color-gold); text-decoration: none; margin-right: 1rem;">Modifier</a>
                            <form method="POST" action="{{ route('admin.services.destroy', $service) }}" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce service ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-family: inherit; font-size: inherit;">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="padding: 2rem; text-align: center; color: var(--color-gray-500);">
                            Aucun service trouvé
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 2rem;">
            {{ $services->links() }}
        </div>
    </div>
</section>
@endsection
