@extends('layouts.admin')

@section('title', 'Nouveau Témoignage - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 3rem 0 2rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Nouveau Témoignage</h1>
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

            <form method="POST" action="{{ route('admin.testimonials.store') }}">
                @csrf

                <!-- Client Name -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Nom du client <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="client_name" value="{{ old('client_name') }}" required style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                </div>

                <!-- Client Position -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Poste du client
                    </label>
                    <input type="text" name="client_position" value="{{ old('client_position') }}" placeholder="Ex: Directeur Général" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                </div>

                <!-- Client Company -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Entreprise du client
                    </label>
                    <input type="text" name="client_company" value="{{ old('client_company') }}" placeholder="Ex: ABC Company" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                </div>

                <!-- Rating -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Note <span style="color: #ef4444;">*</span>
                    </label>
                    <select name="rating" required style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; background: white; cursor: pointer;">
                        <option value="">Sélectionner une note</option>
                        <option value="5" {{ old('rating') == '5' ? 'selected' : '' }}>5 ★★★★★ - Excellent</option>
                        <option value="4" {{ old('rating') == '4' ? 'selected' : '' }}>4 ★★★★☆ - Très bien</option>
                        <option value="3" {{ old('rating') == '3' ? 'selected' : '' }}>3 ★★★☆☆ - Bien</option>
                        <option value="2" {{ old('rating') == '2' ? 'selected' : '' }}>2 ★★☆☆☆ - Moyen</option>
                        <option value="1" {{ old('rating') == '1' ? 'selected' : '' }}>1 ★☆☆☆☆ - Insatisfait</option>
                    </select>
                </div>

                <!-- Testimonial -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Témoignage <span style="color: #ef4444;">*</span>
                    </label>
                    <textarea name="testimonial" required rows="6" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; resize: vertical; transition: var(--transition-fast);">{{ old('testimonial') }}</textarea>
                    <small style="color: var(--color-gray-600); display: block; margin-top: 0.5rem;">Le texte complet du témoignage</small>
                </div>

                <!-- Project Type -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Type de projet
                    </label>
                    <input type="text" name="project_type" value="{{ old('project_type') }}" placeholder="Ex: Développement Web, Montage PC, Formation" style="width: 100%; padding: 0.75rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                    <small style="color: var(--color-gray-600); display: block; margin-top: 0.5rem;">Type de projet ou service concerné</small>
                </div>

                <!-- Checkboxes -->
                <div style="margin-bottom: 2rem;">
                    <label style="display: flex; align-items: center; gap: 0.75rem; cursor: pointer; padding: 1rem; background: var(--color-gray-50); border-radius: var(--border-radius-md); margin-bottom: 1rem;">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active') ? 'checked' : '' }} style="width: 20px; height: 20px; cursor: pointer;">
                        <div>
                            <strong style="color: var(--color-navy); display: block;">Actif / Validé</strong>
                            <small style="color: var(--color-gray-600);">Le témoignage sera visible sur le site public</small>
                        </div>
                    </label>

                    <label style="display: flex; align-items: center; gap: 0.75rem; cursor: pointer; padding: 1rem; background: var(--color-gray-50); border-radius: var(--border-radius-md);">
                        <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }} style="width: 20px; height: 20px; cursor: pointer;">
                        <div>
                            <strong style="color: var(--color-navy); display: block;">En vedette</strong>
                            <small style="color: var(--color-gray-600);">Témoignage mis en avant (badge doré + affichage prioritaire)</small>
                        </div>
                    </label>
                </div>

                <!-- Submit Buttons -->
                <div style="display: flex; gap: 1rem; justify-content: flex-end;">
                    <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary" style="text-decoration: none;">Annuler</a>
                    <button type="submit" class="btn btn-primary">Créer le témoignage</button>
                </div>
            </form>
        </div>
    </div>
</section>

@push('styles')
<style>
input:focus, textarea:focus, select:focus {
    outline: none;
    border-color: var(--color-gold);
}
</style>
@endpush
@endsection
