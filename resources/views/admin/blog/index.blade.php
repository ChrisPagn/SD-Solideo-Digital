@extends('layouts.admin')

@section('title', 'Gestion du Blog - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 8rem 0 4rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Gestion du Blog</h1>
    </div>
</section>

<section class="section">
    <div class="section-container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <h2 class="section-title">Liste des articles</h2>
            <a href="{{ route('admin.blog.create') }}" class="btn btn-primary">+ Nouvel article</a>
        </div>

        @if(session('success'))
        <div style="background: #10b981; color: white; padding: 1rem; border-radius: var(--border-radius-md); margin-bottom: 2rem;">
            {{ session('success') }}
        </div>
        @endif

        <div style="background: white; border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-md);">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: var(--color-navy); color: white;">
                    <tr>
                        <th style="padding: 1rem; text-align: left;">Titre</th>
                        <th style="padding: 1rem; text-align: left;">Catégorie</th>
                        <th style="padding: 1rem; text-align: center;">Statut</th>
                        <th style="padding: 1rem; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)
                    <tr style="border-bottom: 1px solid var(--color-gray-200);">
                        <td style="padding: 1rem;">{{ $post->title }}</td>
                        <td style="padding: 1rem;">{{ $post->category }}</td>
                        <td style="padding: 1rem; text-align: center;">
                            <span style="background: {{ $post->is_published ? '#10b981' : '#f59e0b' }}; color: white; padding: 0.25rem 0.75rem; border-radius: var(--border-radius-sm); font-size: 0.85rem;">
                                {{ $post->is_published ? 'Publié' : 'Brouillon' }}
                            </span>
                        </td>
                        <td style="padding: 1rem; text-align: right;">
                            <a href="{{ route('admin.blog.edit', $post) }}" style="color: var(--color-gold); text-decoration: none; margin-right: 1rem;">Modifier</a>
                            <form method="POST" action="{{ route('admin.blog.destroy', $post) }}" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr ?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-family: inherit; font-size: inherit;">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" style="padding: 2rem; text-align: center; color: var(--color-gray-500);">
                            Aucun article trouvé
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 2rem;">
            {{ $posts->links() }}
        </div>
    </div>
</section>
@endsection
