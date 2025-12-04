@extends('layouts.admin')

@section('title', 'Nouveau Service - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 8rem 0 4rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Nouveau Service</h1>
        <p class="hero-subtitle" style="color: var(--color-beige);">
            Créer un nouveau service
        </p>
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

            <div style="background: white; padding: 3rem; border-radius: var(--border-radius-lg); box-shadow: var(--shadow-md);">
                <form method="POST" action="{{ route('admin.services.store') }}">
                    @csrf

                    <div style="margin-bottom: 1.5rem;">
                        <label for="name" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Nom du service *
                        </label>
                        <input type="text" id="name" name="name" value="{{ old('name') }}" required
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="short_description" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Description courte *
                        </label>
                        <textarea id="short_description" name="short_description" rows="3" required
                                  style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">{{ old('short_description') }}</textarea>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="description" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Description complète *
                        </label>
                        <textarea id="description" name="description" rows="8" required
                                  style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">{{ old('description') }}</textarea>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="icon" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Icône (emoji ou code)
                        </label>
                        <input type="text" id="icon" name="icon" value="{{ old('icon') }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="price" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Prix
                        </label>
                        <input type="text" id="price" name="price" value="{{ old('price') }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="order" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Ordre d'affichage
                        </label>
                        <input type="number" id="order" name="order" value="{{ old('order', 0) }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                   style="width: 18px; height: 18px; margin-right: 0.5rem; cursor: pointer;">
                            <span style="color: var(--color-gray-700);">Service actif</span>
                        </label>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                                   style="width: 18px; height: 18px; margin-right: 0.5rem; cursor: pointer;">
                            <span style="color: var(--color-gray-700);">Mettre en vedette</span>
                        </label>
                    </div>

                    <div style="display: flex; justify-content: space-between; margin-top: 2rem;">
                        <a href="{{ route('admin.services.index') }}" style="color: var(--color-navy); text-decoration: none;">
                            ← Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Créer le service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
