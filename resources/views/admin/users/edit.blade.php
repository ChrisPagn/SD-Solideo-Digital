@extends('layouts.admin')

@section('title', 'Modifier Utilisateur - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 3rem 0 2rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Modifier Utilisateur</h1>
    </div>
</section>

<section class="section">
    <div class="section-container" style="max-width: 800px;">
        <div style="background: white; border-radius: var(--border-radius-lg); padding: 2.5rem; box-shadow: var(--shadow-md);">
            @if ($errors->any())
            <div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: var(--border-radius-md); margin-bottom: 2rem;">
                <strong>Erreurs :</strong>
                <ul style="margin-top: 0.5rem; margin-left: 1.5rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if($user->id === auth()->id())
            <div style="background: linear-gradient(135deg, #dbeafe 0%, #bfdbfe 100%); color: #1e40af; padding: 1rem; border-radius: var(--border-radius-md); margin-bottom: 2rem; border-left: 4px solid #3b82f6;">
                <strong>ℹ️ Information</strong>
                <p style="margin-top: 0.5rem;">Vous modifiez votre propre compte. Vous ne pouvez pas changer votre rôle.</p>
            </div>
            @endif

            <form method="POST" action="{{ route('admin.users.update', $user) }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Nom complet <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name', $user->name) }}" required autofocus style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                </div>

                <!-- Email -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Email <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email', $user->email) }}" required style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                </div>

                <!-- Password -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Nouveau mot de passe
                    </label>
                    <input type="password" name="password" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                    <small style="color: var(--color-gray-600); display: block; margin-top: 0.5rem;">Laisser vide pour ne pas changer le mot de passe</small>
                </div>

                <!-- Password Confirmation -->
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Confirmer le nouveau mot de passe
                    </label>
                    <input type="password" name="password_confirmation" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                </div>

                <!-- Admin Checkbox -->
                <div style="margin-bottom: 2rem;">
                    <label style="display: flex; align-items: center; gap: 0.75rem; cursor: {{ $user->id === auth()->id() ? 'not-allowed' : 'pointer' }}; padding: 1rem; background: var(--color-gray-50); border-radius: var(--border-radius-md); {{ $user->id === auth()->id() ? 'opacity: 0.6;' : '' }}">
                        <input type="checkbox" name="is_admin" value="1" {{ old('is_admin', $user->is_admin) ? 'checked' : '' }} {{ $user->id === auth()->id() ? 'disabled' : '' }} style="width: 20px; height: 20px; cursor: {{ $user->id === auth()->id() ? 'not-allowed' : 'pointer' }};">
                        <div>
                            <strong style="color: var(--color-navy); display: block;">👑 Administrateur</strong>
                            <small style="color: var(--color-gray-600);">Accès complet au panneau d'administration</small>
                        </div>
                    </label>
                    @if($user->id === auth()->id())
                    <small style="color: var(--color-gray-600); display: block; margin-top: 0.5rem; margin-left: 2.5rem;">
                        Vous ne pouvez pas modifier vos propres droits
                    </small>
                    @endif
                </div>

                <!-- Submit Buttons -->
                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary" style="text-decoration: none;">Annuler</a>
                    <button type="submit" class="btn btn-primary">Mettre à jour</button>
                </div>
            </form>
        </div>
    </div>
</section>

@push('styles')
<style>
input:focus {
    outline: none;
    border-color: var(--color-gold);
}
</style>
@endpush
@endsection
