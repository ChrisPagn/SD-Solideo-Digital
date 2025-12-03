@extends('layouts.app')

@section('title', 'Voir Contact - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 8rem 0 4rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Message de Contact</h1>
    </div>
</section>

<section class="section">
    <div class="section-container">
        <div style="max-width: 800px; margin: 0 auto;">
            <div style="background: white; padding: 3rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md);">
                <div style="margin-bottom: 2rem; padding-bottom: 2rem; border-bottom: 1px solid var(--color-gray-200);">
                    <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                        <h3 style="color: var(--color-navy); margin: 0;">{{ $contact->subject }}</h3>
                        <span style="background: {{ $contact->status == 'new' ? '#f59e0b' : ($contact->status == 'read' ? '#3b82f6' : '#10b981') }}; color: white; padding: 0.25rem 0.75rem; border-radius: var(--border-radius-sm); font-size: 0.85rem;">
                            {{ ucfirst($contact->status) }}
                        </span>
                    </div>
                    <p style="color: var(--color-gray-600); margin: 0;">
                        Reçu le {{ $contact->created_at->format('d/m/Y à H:i') }}
                    </p>
                </div>

                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 2rem;">
                    <div>
                        <strong style="color: var(--color-navy);">Nom:</strong>
                        <p style="margin: 0.25rem 0 0 0;">{{ $contact->name }}</p>
                    </div>
                    <div>
                        <strong style="color: var(--color-navy);">Email:</strong>
                        <p style="margin: 0.25rem 0 0 0;"><a href="mailto:{{ $contact->email }}" style="color: var(--color-gold);">{{ $contact->email }}</a></p>
                    </div>
                    @if($contact->phone)
                    <div>
                        <strong style="color: var(--color-navy);">Téléphone:</strong>
                        <p style="margin: 0.25rem 0 0 0;">{{ $contact->phone }}</p>
                    </div>
                    @endif
                </div>

                <div style="margin-bottom: 2rem;">
                    <strong style="color: var(--color-navy);">Message:</strong>
                    <p style="margin: 0.5rem 0 0 0; color: var(--color-gray-700); line-height: 1.6;">
                        {{ $contact->message }}
                    </p>
                </div>

                @if($contact->reply)
                <div style="background: var(--color-gray-50); padding: 1.5rem; border-radius: var(--border-radius-md); margin-bottom: 2rem;">
                    <strong style="color: var(--color-navy);">Réponse envoyée:</strong>
                    <p style="margin: 0.5rem 0 0 0; color: var(--color-gray-700); line-height: 1.6;">
                        {{ $contact->reply }}
                    </p>
                </div>
                @endif

                <div style="display: flex; justify-content: space-between; margin-top: 2rem; padding-top: 2rem; border-top: 1px solid var(--color-gray-200);">
                    <a href="{{ route('admin.contacts.index') }}" style="color: var(--color-navy); text-decoration: none;">
                        ← Retour
                    </a>
                    <form method="POST" action="{{ route('admin.contacts.destroy', $contact) }}" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce message ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" style="background: #ef4444; color: white; border: none; padding: 0.75rem 1.5rem; border-radius: var(--border-radius-md); cursor: pointer; font-family: inherit; font-size: inherit;">
                            Supprimer
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
