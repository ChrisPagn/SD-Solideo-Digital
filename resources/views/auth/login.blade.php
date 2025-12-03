@extends('layouts.app')

@section('title', 'Connexion - Solideo Digital')
@section('description', 'Connectez-vous à votre espace administration')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 8rem 0 4rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Connexion</h1>
        <p class="hero-subtitle" style="color: var(--color-beige);">
            Accédez à votre espace d'administration
        </p>
    </div>
</section>

<!-- Login Form Section -->
<section class="section">
    <div class="section-container">
        <div style="max-width: 500px; margin: 0 auto;">
            @if (session('status'))
            <div style="background: #10b981; color: white; padding: 1rem; border-radius: var(--border-radius-md); margin-bottom: 2rem;">
                {{ session('status') }}
            </div>
            @endif

            @if ($errors->any())
            <div style="background: #ef4444; color: white; padding: 1rem; border-radius: var(--border-radius-md); margin-bottom: 2rem;">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div style="background: white; padding: 3rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md);">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="email" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Adresse email
                        </label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <!-- Password -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="password" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Mot de passe
                        </label>
                        <input type="password" id="password" name="password" required autocomplete="current-password"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <!-- Remember Me -->
                    <div style="margin-bottom: 1.5rem;">
                        <label for="remember_me" style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" id="remember_me" name="remember"
                                   style="width: 18px; height: 18px; margin-right: 0.5rem; cursor: pointer;">
                            <span style="color: var(--color-gray-700);">Se souvenir de moi</span>
                        </label>
                    </div>

                    <!-- Submit Button -->
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" style="color: var(--color-gold); text-decoration: none; font-size: 0.9rem;">
                            Mot de passe oublié ?
                        </a>
                        @endif

                        <button type="submit" class="btn btn-primary">
                            Se connecter
                        </button>
                    </div>
                </form>
            </div>

            <div style="text-align: center; margin-top: 2rem;">
                <a href="{{ route('home') }}" style="color: var(--color-navy); text-decoration: none;">
                    ← Retour au site
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
