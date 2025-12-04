@extends('layouts.app')

@section('title', 'Laisser un témoignage - Solideo Digital')
@section('description', 'Partagez votre expérience avec Solideo Digital. Votre avis compte pour nous et aide d\'autres clients à nous découvrir.')

@section('content')
<!-- Hero Section -->
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 8rem 0 4rem; position: relative; overflow: hidden;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 3.5rem; margin-bottom: 1.5rem;">Laisser un témoignage</h1>
        <p class="hero-subtitle" style="color: rgba(255,255,255,0.9); font-size: 1.3rem; font-weight: 300;">Partagez votre expérience avec nous</p>
    </div>
</section>

<!-- Form Section -->
<section class="section" style="padding: 4rem 0;">
    <div class="section-container" style="max-width: 700px;">
        <div style="background: white; border-radius: var(--border-radius-lg); padding: 3rem; box-shadow: var(--shadow-lg);">
            <!-- Info Box -->
            <div style="background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%); padding: 1.5rem; border-radius: var(--border-radius-md); margin-bottom: 2rem; border-left: 4px solid var(--color-navy);">
                <div style="display: flex; gap: 1rem; align-items: start;">
                    <span style="font-size: 2rem;">💬</span>
                    <div>
                        <p style="color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">Votre avis compte !</p>
                        <p style="color: var(--color-gray-700); font-size: 0.95rem; line-height: 1.6;">
                            Votre témoignage sera publié après validation par notre équipe. Il aidera d'autres clients à découvrir nos services et à nous faire confiance.
                        </p>
                    </div>
                </div>
            </div>

            @if ($errors->any())
            <div style="background: #fee2e2; color: #991b1b; padding: 1rem; border-radius: var(--border-radius-md); margin-bottom: 2rem; border-left: 4px solid #dc2626;">
                <strong>⚠️ Erreurs détectées :</strong>
                <ul style="margin-top: 0.5rem; margin-left: 1.5rem; margin-bottom: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('testimonials.store') }}">
                @csrf

                <!-- Client Name -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Votre nom <span style="color: #ef4444;">*</span>
                    </label>
                    <input type="text" name="client_name" value="{{ old('client_name') }}" required placeholder="Ex: Jean Dupont" style="width: 100%; padding: 0.875rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                    <small style="color: var(--color-gray-600); display: block; margin-top: 0.5rem;">Votre prénom et nom</small>
                </div>

                <!-- Client Position -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Votre poste
                    </label>
                    <input type="text" name="client_position" value="{{ old('client_position') }}" placeholder="Ex: Directeur Général, Freelance..." style="width: 100%; padding: 0.875rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                    <small style="color: var(--color-gray-600); display: block; margin-top: 0.5rem;">Optionnel</small>
                </div>

                <!-- Client Company -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Votre entreprise
                    </label>
                    <input type="text" name="client_company" value="{{ old('client_company') }}" placeholder="Ex: ABC Company" style="width: 100%; padding: 0.875rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; transition: var(--transition-fast);">
                    <small style="color: var(--color-gray-600); display: block; margin-top: 0.5rem;">Optionnel</small>
                </div>

                <!-- Rating -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.75rem;">
                        Votre note <span style="color: #ef4444;">*</span>
                    </label>
                    <div style="display: flex; gap: 1rem; flex-wrap: wrap;">
                        @for($i = 5; $i >= 1; $i--)
                        <label style="flex: 1; min-width: 150px; cursor: pointer;">
                            <input type="radio" name="rating" value="{{ $i }}" {{ old('rating') == $i ? 'checked' : '' }} required style="display: none;" class="rating-input">
                            <div class="rating-option" style="padding: 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); text-align: center; transition: var(--transition-fast);">
                                <div style="font-size: 1.5rem; margin-bottom: 0.5rem;">
                                    @for($j = 1; $j <= 5; $j++)
                                        <span class="star" data-rating="{{ $i }}">{{ $j <= $i ? '★' : '☆' }}</span>
                                    @endfor
                                </div>
                                <div style="font-size: 0.9rem; color: var(--color-gray-600);">
                                    @if($i == 5) Excellent
                                    @elseif($i == 4) Très bien
                                    @elseif($i == 3) Bien
                                    @elseif($i == 2) Moyen
                                    @else Insatisfait
                                    @endif
                                </div>
                            </div>
                        </label>
                        @endfor
                    </div>
                </div>

                <!-- Project Type -->
                <div style="margin-bottom: 1.5rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Type de projet/service
                    </label>
                    <select name="project_type" style="width: 100%; padding: 0.875rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; background: white; cursor: pointer;">
                        <option value="">Sélectionner un type de projet</option>
                        <option value="Développement Web" {{ old('project_type') == 'Développement Web' ? 'selected' : '' }}>Développement Web</option>
                        <option value="Montage PC" {{ old('project_type') == 'Montage PC' ? 'selected' : '' }}>Montage PC sur mesure</option>
                        <option value="Montage NAS" {{ old('project_type') == 'Montage NAS' ? 'selected' : '' }}>Montage NAS</option>
                        <option value="Formation" {{ old('project_type') == 'Formation' ? 'selected' : '' }}>Formation</option>
                        <option value="Assistance technique" {{ old('project_type') == 'Assistance technique' ? 'selected' : '' }}>Assistance technique</option>
                        <option value="Autre" {{ old('project_type') == 'Autre' ? 'selected' : '' }}>Autre</option>
                    </select>
                    <small style="color: var(--color-gray-600); display: block; margin-top: 0.5rem;">Optionnel - Quel service avez-vous utilisé ?</small>
                </div>

                <!-- Testimonial -->
                <div style="margin-bottom: 2rem;">
                    <label style="display: block; font-weight: 600; color: var(--color-navy); margin-bottom: 0.5rem;">
                        Votre témoignage <span style="color: #ef4444;">*</span>
                    </label>
                    <textarea name="testimonial" required rows="6" placeholder="Partagez votre expérience avec Solideo Digital..." style="width: 100%; padding: 0.875rem 1rem; border: 2px solid var(--color-gray-200); border-radius: var(--border-radius-md); font-family: inherit; font-size: 1rem; resize: vertical; transition: var(--transition-fast); line-height: 1.6;">{{ old('testimonial') }}</textarea>
                    <div style="display: flex; justify-content: space-between; margin-top: 0.5rem;">
                        <small style="color: var(--color-gray-600);">Minimum 20 caractères, maximum 1000</small>
                        <small id="char-count" style="color: var(--color-gray-500); font-weight: 600;">0 / 1000</small>
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div style="display: flex; gap: 1rem; justify-content: flex-end; flex-wrap: wrap;">
                    <a href="{{ route('testimonials') }}" class="btn btn-secondary" style="text-decoration: none;">Annuler</a>
                    <button type="submit" class="btn btn-primary" style="display: flex; align-items: center; gap: 0.5rem;">
                        <span>✉️</span>
                        <span>Envoyer mon témoignage</span>
                    </button>
                </div>
            </form>
        </div>

        <!-- Trust Badges -->
        <div style="margin-top: 3rem; text-align: center;">
            <p style="color: var(--color-gray-600); font-size: 0.9rem; margin-bottom: 1rem;">
                🔒 Vos données sont sécurisées et ne seront jamais partagées
            </p>
        </div>
    </div>
</section>

@push('styles')
<style>
input:focus, textarea:focus, select:focus {
    outline: none;
    border-color: var(--color-gold);
}

.rating-option {
    background: white;
}

.rating-input:checked + .rating-option {
    border-color: var(--color-gold);
    background: linear-gradient(135deg, #fffbeb 0%, #fef3c7 100%);
}

.rating-option:hover {
    border-color: var(--color-gold);
    transform: translateY(-2px);
    box-shadow: var(--shadow-md);
}

.star {
    color: var(--color-gold);
    font-size: 1.25rem;
}

textarea[name="testimonial"] {
    min-height: 150px;
}

@media (max-width: 768px) {
    .hero-title {
        font-size: 2.5rem !important;
    }

    .hero-subtitle {
        font-size: 1.1rem !important;
    }

    .rating-option {
        min-width: 100% !important;
    }
}
</style>
@endpush

@push('scripts')
<script>
// Character counter
const textarea = document.querySelector('textarea[name="testimonial"]');
const charCount = document.getElementById('char-count');

if (textarea && charCount) {
    textarea.addEventListener('input', function() {
        const length = this.value.length;
        charCount.textContent = `${length} / 1000`;

        if (length > 1000) {
            charCount.style.color = '#ef4444';
        } else if (length < 20) {
            charCount.style.color = '#f59e0b';
        } else {
            charCount.style.color = '#10b981';
        }
    });

    // Initial count
    textarea.dispatchEvent(new Event('input'));
}
</script>
@endpush
@endsection
