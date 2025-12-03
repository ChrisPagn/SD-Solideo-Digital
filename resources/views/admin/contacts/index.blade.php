@extends('layouts.app')

@section('title', 'Gestion des Contacts - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 8rem 0 4rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Gestion des Contacts</h1>
    </div>
</section>

<section class="section">
    <div class="section-container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 class="section-title">Messages de contact</h2>
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
                        <th style="padding: 1rem; text-align: left;">Email</th>
                        <th style="padding: 1rem; text-align: left;">Sujet</th>
                        <th style="padding: 1rem; text-align: center;">Statut</th>
                        <th style="padding: 1rem; text-align: left;">Date</th>
                        <th style="padding: 1rem; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($contacts as $contact)
                    <tr style="border-bottom: 1px solid var(--color-gray-200);">
                        <td style="padding: 1rem;">{{ $contact->name }}</td>
                        <td style="padding: 1rem;">{{ $contact->email }}</td>
                        <td style="padding: 1rem;">{{ Str::limit($contact->subject, 30) }}</td>
                        <td style="padding: 1rem; text-align: center;">
                            <span style="background: {{ $contact->status == 'new' ? '#f59e0b' : ($contact->status == 'read' ? '#3b82f6' : '#10b981') }}; color: white; padding: 0.25rem 0.75rem; border-radius: var(--border-radius-sm); font-size: 0.85rem;">
                                {{ ucfirst($contact->status) }}
                            </span>
                        </td>
                        <td style="padding: 1rem;">{{ $contact->created_at->format('d/m/Y') }}</td>
                        <td style="padding: 1rem; text-align: right;">
                            <a href="{{ route('admin.contacts.show', $contact) }}" style="color: var(--color-gold); text-decoration: none; margin-right: 1rem;">Voir</a>
                            <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-family: inherit; font-size: inherit;">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" style="padding: 2rem; text-align: center; color: var(--color-gray-500);">
                            Aucun message trouvé
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 2rem;">
            {{ $contacts->links() }}
        </div>
    </div>
</section>
@endsection
