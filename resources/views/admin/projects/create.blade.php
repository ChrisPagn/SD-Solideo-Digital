@extends('layouts.admin')

@section('title', 'Nouveau Projet - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 3rem 0 2rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Nouveau Projet</h1>
    </div>
</section>

<section class="section">
    <div class="section-container">
        <div style="max-width: 900px; margin: 0 auto;">
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
                <form method="POST" action="{{ route('admin.projects.store') }}">
                    @csrf

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                        <div>
                            <label for="title" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                                Titre *
                            </label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}" required
                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                        </div>

                        <div>
                            <label for="category" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                                Catégorie *
                            </label>
                            <input type="text" id="category" name="category" value="{{ old('category') }}" required
                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                        </div>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="description" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Description courte *
                        </label>
                        <textarea id="description" name="description" rows="3" required
                                  style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">{{ old('description') }}</textarea>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="content" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Contenu complet *
                        </label>
                        <textarea id="content" name="content" rows="10" required
                                  style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">{{ old('content') }}</textarea>
                    </div>

                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem; margin-bottom: 1.5rem;">
                        <div>
                            <label for="client" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                                Client
                            </label>
                            <input type="text" id="client" name="client" value="{{ old('client') }}"
                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                        </div>

                        <div>
                            <label for="completed_at" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                                Date de réalisation
                            </label>
                            <input type="date" id="completed_at" name="completed_at" value="{{ old('completed_at') }}"
                                   style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                        </div>
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="technologies" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            Technologies (séparées par des virgules)
                        </label>
                        <input type="text" id="technologies" name="technologies" value="{{ old('technologies') }}"
                               placeholder="Laravel, Vue.js, MySQL"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <div style="margin-bottom: 1.5rem;">
                        <label for="url" style="display: block; color: var(--color-navy); font-weight: 600; margin-bottom: 0.5rem;">
                            URL du projet
                        </label>
                        <input type="url" id="url" name="url" value="{{ old('url') }}"
                               style="width: 100%; padding: 0.75rem; border: 1px solid var(--color-gray-300); border-radius: var(--border-radius-md); font-size: 1rem;">
                    </div>

                    <div style="display: flex; gap: 2rem; margin-bottom: 1.5rem;">
                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                   style="width: 18px; height: 18px; margin-right: 0.5rem; cursor: pointer;">
                            <span style="color: var(--color-gray-700);">Projet actif</span>
                        </label>

                        <label style="display: flex; align-items: center; cursor: pointer;">
                            <input type="checkbox" name="is_featured" value="1" {{ old('is_featured') ? 'checked' : '' }}
                                   style="width: 18px; height: 18px; margin-right: 0.5rem; cursor: pointer;">
                            <span style="color: var(--color-gray-700);">Projet en vedette</span>
                        </label>
                    </div>

                    <div style="display: flex; justify-content: space-between; margin-top: 2rem;">
                        <a href="{{ route('admin.projects.index') }}" style="color: var(--color-navy); text-decoration: none;">
                            ← Retour
                        </a>
                        <button type="submit" class="btn btn-primary">
                            Créer le projet
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
