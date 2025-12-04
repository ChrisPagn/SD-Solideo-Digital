@extends('layouts.admin')

@section('title', 'Nouvel Utilisateur - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 3rem 0 2rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Nouvel Utilisateur</h1>
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

            <form method="POST" action="{{ route('admin.users.store') }}">
                @csrf

                <!-- Name -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Nom complet <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="name" value="{{ old('name') }}" required autofocus style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                </div>

                <!-- Email -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Email <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="email" name="email" value="{{ old('email') }}" required style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                </div>

                <!-- Password -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Mot de passe <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="password" name="password" required style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                    <small style="color: var(--color-gray-600); display: block; margin-top: 0.5rem;">Minimum 8 caractères</small>
                </div>

                <!-- Password Confirmation -->
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Confirmer le mot de passe <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="password" name="password_confirmation" required style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                </div>

                <!-- Admin Checkbox -->
                <div style="margin-bottom: 2rem;">
                    <label style="display: flex; align-items: center; gap: 0.75rem; cursor: pointer; padding: 1rem; background: var(--color-gray-50); border-radius: var(--border-radius-md);">
                        <input type="checkbox" name="is_admin" value="1" {{ old('is_admin') ? 'checked' : '' }} style="width: 20px; height: 20px; cursor: pointer;">
                        <div>
                            <strong style="color: var(--color-navy); display: block;">👑 Administrateur</strong>
                            <small style="color: var(--color-gray-600);">Accès complet au panneau d'administration</small>
                        </div>
                    </label>
                </div>

                <!-- Submit Buttons -->
                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary" style="text-decoration: none;">Annuler</a>
                    <button type="submit" class="btn btn-primary">Créer l'utilisateur</button>
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
