@extends('layouts.app')

@section('title', 'Prendre rendez-vous - Solideo Digital')
@section('description', 'Prenez rendez-vous pour un dépannage PC ou une consultation technique')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 6rem 0 4rem;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white;">Prendre rendez-vous</h1>
        <p class="hero-subtitle" style="color: var(--color-beige);">
            Réservez un créneau pour votre dépannage PC ou consultation
        </p>
    </div>
</section>

<!-- Appointment Form Section -->
<section class="section">
    <div class="section-container">
        <div style="max-width: 800px; margin: 0 auto;">
            @if(session('success'))
            <div style="background: #10b981; color: white; padding: 1.5rem; border-radius: var(--border-radius-md); margin-bottom: 2rem; text-align: center;">
                <strong>{{ session('success') }}</strong>
            </div>
            @endif

            @if($errors->any())
            <div style="background: #ef4444; color: white; padding: 1rem; border-radius: var(--border-radius-md); margin-bottom: 2rem;">
                <ul style="margin: 0; padding-left: 1.5rem;">
                    @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <div style="background: white; padding: 3rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md);">
                <h2 style="color: var(--color-navy); font-size: 2rem; margin-bottom: 1rem;">Réservez votre rendez-vous</h2>
                <p style="color: var(--color-gray-600); margin-bottom: 2rem;">
                    Remplissez le formulaire ci-dessous pour prendre rendez-vous. Nous vous contacterons pour confirmer la date et l'heure.
                </p>

                <form action="{{ route('appointments.store') }}" method="POST">
                    @csrf

                    <div style="margin-bottom: 1.5rem;">
                        <label for="name" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Nom complet *
                        </label>
                        <input type="text" id="name" name="name" required value="{{ old('name') }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                        <div>
                            <label for="email" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                                Email *
                            </label>
                            <input type="email" id="email" name="email" required value="{{ old('email') }}"
                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                        </div>

                        <div>
                            <label for="phone" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                                Téléphone *
                            </label>
                            <input type="tel" id="phone" name="phone" required value="{{ old('phone') }}"
                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                        </div>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="service_type" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Type de service *
                        </label>
                        <select id="service_type" name="service_type" required
                                style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                            <option value="">Sélectionnez un service</option>
                            <option value="depannage_pc" {{ old('service_type') == 'depannage_pc' ? 'selected' : '' }}>Dépannage PC</option>
                            <option value="montage_pc" {{ old('service_type') == 'montage_pc' ? 'selected' : '' }}>Montage PC sur mesure</option>
                            <option value="maintenance" {{ old('service_type') == 'maintenance' ? 'selected' : '' }}>Maintenance informatique</option>
                            <option value="consultation" {{ old('service_type') == 'consultation' ? 'selected' : '' }}>Consultation technique</option>
                            <option value="formation" {{ old('service_type') == 'formation' ? 'selected' : '' }}>Formation</option>
                        </select>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1.5rem;">
                        <div>
                            <label for="preferred_date" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                                Date préférée *
                            </label>
                            <input type="date" id="preferred_date" name="preferred_date" required
                                   value="{{ old('preferred_date') }}"
                                   min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                        </div>

                        <div>
                            <label for="preferred_time" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                                Heure préférée *
                            </label>
                            <select id="preferred_time" name="preferred_time" required
                                    style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                                <option value="">Sélectionnez une heure</option>
                                <option value="09:00" {{ old('preferred_time') == '09:00' ? 'selected' : '' }}>09:00</option>
                                <option value="10:00" {{ old('preferred_time') == '10:00' ? 'selected' : '' }}>10:00</option>
                                <option value="11:00" {{ old('preferred_time') == '11:00' ? 'selected' : '' }}>11:00</option>
                                <option value="14:00" {{ old('preferred_time') == '14:00' ? 'selected' : '' }}>14:00</option>
                                <option value="15:00" {{ old('preferred_time') == '15:00' ? 'selected' : '' }}>15:00</option>
                                <option value="16:00" {{ old('preferred_time') == '16:00' ? 'selected' : '' }}>16:00</option>
                                <option value="17:00" {{ old('preferred_time') == '17:00' ? 'selected' : '' }}>17:00</option>
                            </select>
                        </div>
                    </div>

                    <div style="margin-bottom: 2rem;">
                        <label for="message" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Description du problème ou besoin
                        </label>
                        <textarea id="message" name="message" rows="5"
                                  style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem; resize: vertical;">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        Confirmer le rendez-vous
                    </button>
                </form>
            </div>

            <!-- Info Card -->
            <div style="background: var(--color-gray-50); padding: 2rem; border-radius: var(--border-radius-md); margin-top: 2rem; border-left: 4px solid var(--color-gold);">
                <h3 style="color: var(--color-navy); margin-bottom: 1rem;">Informations importantes</h3>
                <ul style="color: var(--color-gray-700); line-height: 1.8; margin: 0; padding-left: 1.5rem;">
                    <li>Nous vous contacterons pour confirmer votre rendez-vous dans les 24h</li>
                    <li>Les rendez-vous sont disponibles du lundi au vendredi, de 9h à 18h</li>
                    <li>Vous pouvez annuler ou modifier votre rendez-vous en nous contactant</li>
                    <li>Un diagnostic initial sera effectué lors du premier rendez-vous</li>
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection
