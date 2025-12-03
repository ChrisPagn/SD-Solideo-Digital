@extends('layouts.app')

@section('title', 'Contact - Solideo Digital')
@section('description', 'Contactez-nous pour discuter de votre projet ou obtenir un devis')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 6rem 0 4rem;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white;">Contactez-nous</h1>
        <p class="hero-subtitle" style="color: var(--color-beige);">
            Nous sommes là pour répondre à toutes vos questions
        </p>
    </div>
</section>

<!-- Contact Section -->
<section class="section">
    <div class="section-container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; max-width: 1200px; margin: 0 auto;">
            <!-- Contact Form -->
            <div>
                <h2 style="color: var(--color-navy); font-size: 2rem; margin-bottom: 1rem;">Envoyez-nous un message</h2>
                <p style="color: var(--color-gray-600); margin-bottom: 2rem;">
                    Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.
                </p>

                @if(session('success'))
                <div style="background: #10b981; color: white; padding: 1rem; border-radius: var(--border-radius-md); margin-bottom: 2rem;">
                    {{ session('success') }}
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

                <form action="{{ route('contact.store') }}" method="POST" style="background: white; padding: 2rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md);">
                    @csrf

                    <div style="margin-bottom: 1.5rem;">
                        <label for="name" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Nom complet *
                        </label>
                        <input type="text" id="name" name="name" required value="{{ old('name') }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="email" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Email *
                        </label>
                        <input type="email" id="email" name="email" required value="{{ old('email') }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="phone" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Téléphone
                        </label>
                        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="service_id" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Service concerné
                        </label>
                        <select id="service_id" name="service_id"
                                style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                            <option value="">Sélectionnez un service</option>
                            @foreach($services as $service)
                            <option value="{{ $service->id }}" {{ old('service_id') == $service->id ? 'selected' : '' }}>
                                {{ $service->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="subject" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Sujet *
                        </label>
                        <input type="text" id="subject" name="subject" required value="{{ old('subject') }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="message" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Message *
                        </label>
                        <textarea id="message" name="message" required rows="6"
                                  style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem; resize: vertical;">{{ old('message') }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary" style="width: 100%;">
                        Envoyer le message
                    </button>
                </form>
            </div>

            <!-- Contact Info -->
            <div>
                <h2 style="color: var(--color-navy); font-size: 2rem; margin-bottom: 1rem;">Informations de contact</h2>

                <div style="background: white; padding: 2rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md); margin-bottom: 2rem;">
                    <div style="margin-bottom: 2rem;">
                        <h3 style="color: var(--color-gold); font-size: 1.2rem; margin-bottom: 0.5rem;">Email</h3>
                        <a href="mailto:contact@solideo-digital.com" style="color: var(--color-gray-700); text-decoration: none;">
                            contact@solideo-digital.com
                        </a>
                    </div>

                    <div style="margin-bottom: 2rem;">
                        <h3 style="color: var(--color-gold); font-size: 1.2rem; margin-bottom: 0.5rem;">Téléphone</h3>
                        <a href="tel:+33000000000" style="color: var(--color-gray-700); text-decoration: none;">
                            +33 (0)X XX XX XX XX
                        </a>
                    </div>

                    <div>
                        <h3 style="color: var(--color-gold); font-size: 1.2rem; margin-bottom: 0.5rem;">Horaires</h3>
                        <p style="color: var(--color-gray-700); margin: 0;">
                            Lundi - Vendredi: 9h00 - 18h00<br>
                            Samedi - Dimanche: Fermé
                        </p>
                    </div>
                </div>

                <div style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 2rem; border-radius: var(--border-radius-lg); color: white;">
                    <h3 style="font-size: 1.5rem; margin-bottom: 1rem;">Besoin d'un rendez-vous ?</h3>
                    <p style="margin-bottom: 1.5rem; color: var(--color-beige);">
                        Pour un dépannage PC ou une consultation technique, prenez rendez-vous directement en ligne.
                    </p>
                    <a href="{{ route('appointments.create') }}" class="btn btn-primary">
                        Prendre rendez-vous
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
