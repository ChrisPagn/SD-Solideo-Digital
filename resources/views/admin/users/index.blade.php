@extends('layouts.admin')

@section('title', 'Gestion des Utilisateurs - Admin')

@section('content')
<section class="hero" style="background: linear-gradient(135deg, var(--color-navy) 0%, var(--color-navy-light) 100%); padding: 3rem 0 2rem; min-height: auto;">
    <div class="hero-container">
        <h1 class="hero-title" style="color: white; font-size: 2.5rem;">Gestion des Utilisateurs</h1>
    </div>
</section>

<section class="section">
    <div class="section-container">
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
            <div>
                <h2 class="section-title" style="margin-bottom: 0.5rem;">Liste des utilisateurs</h2>
                @php
                    $adminCount = \App\Models\User::where('is_admin', true)->count();
                    $userCount = \App\Models\User::where('is_admin', false)->count();
                @endphp
                <p style="color: var(--color-gray-600); font-size: 0.95rem;">
                    {{ $adminCount }} administrateur(s) • {{ $userCount }} utilisateur(s)
                </p>
            </div>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Nouvel utilisateur</a>
        </div>

        @if(session('success'))
        <div style="background: #10b981; color: white; padding: 1rem; border-radius: var(--border-radius-md); margin-bottom: 2rem;">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div style="background: #ef4444; color: white; padding: 1rem; border-radius: var(--border-radius-md); margin-bottom: 2rem;">
            {{ session('error') }}
        </div>
        @endif

        <div style="background: white; border-radius: var(--border-radius-lg); overflow: hidden; box-shadow: var(--shadow-md);">
            <table style="width: 100%; border-collapse: collapse;">
                <thead style="background: var(--color-navy); color: white;">
                    <tr>
                        <th style="padding: 1rem; text-align: left;">Nom</th>
                        <th style="padding: 1rem; text-align: left;">Email</th>
                        <th style="padding: 1rem; text-align: center;">Rôle</th>
                        <th style="padding: 1rem; text-align: center;">Inscription</th>
                        <th style="padding: 1rem; text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr style="border-bottom: 1px solid var(--color-gray-200);">
                        <td style="padding: 1rem;">
                            <div style="display: flex; align-items: center; gap: 0.5rem;">
                                {{ $user->name }}
                                @if($user->id === auth()->id())
                                <span style="background: var(--color-gold); color: white; padding: 0.25rem 0.5rem; border-radius: var(--border-radius-sm); font-size: 0.75rem; font-weight: 600;">Vous</span>
                                @endif
                            </div>
                        </td>
                        <td style="padding: 1rem;">{{ $user->email }}</td>
                        <td style="padding: 1rem; text-align: center;">
                            <form method="POST" action="{{ route('admin.users.toggle-admin', $user) }}" style="display: inline;">
                                @csrf
                                @method('PATCH')
                                <button
                                    type="submit"
                                    @if($user->id === auth()->id() || ($user->is_admin && \App\Models\User::where('is_admin', true)->count() <= 1))
                                        disabled
                                        title="Action impossible"
                                        style="background: {{ $user->is_admin ? '#10b981' : '#6b7280' }}; color: white; padding: 0.5rem 1rem; border-radius: var(--border-radius-md); border: none; font-size: 0.85rem; font-weight: 600; cursor: not-allowed; opacity: 0.6;"
                                    @else
                                        style="background: {{ $user->is_admin ? '#10b981' : '#6b7280' }}; color: white; padding: 0.5rem 1rem; border-radius: var(--border-radius-md); border: none; font-size: 0.85rem; font-weight: 600; cursor: pointer; transition: var(--transition-fast);"
                                        onmouseover="this.style.opacity='0.8'"
                                        onmouseout="this.style.opacity='1'"
                                    @endif
                                >
                                    {{ $user->is_admin ? '👑 Admin' : '👤 Utilisateur' }}
                                </button>
                            </form>
                        </td>
                        <td style="padding: 1rem; text-align: center; color: var(--color-gray-600); font-size: 0.9rem;">
                            {{ $user->created_at->format('d/m/Y') }}
                        </td>
                        <td style="padding: 1rem; text-align: right;">
                            <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                                <a href="{{ route('admin.users.edit', $user) }}" style="color: var(--color-gold); text-decoration: none; padding: 0.5rem 1rem; border: 1px solid var(--color-gold); border-radius: var(--border-radius-sm); font-size: 0.9rem; transition: var(--transition-fast);">
                                    Modifier
                                </a>
                                @if($user->id !== auth()->id())
                                <form method="POST" action="{{ route('admin.users.destroy', $user) }}" style="display: inline;" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: #ef4444; color: white; border: none; padding: 0.5rem 1rem; border-radius: var(--border-radius-sm); cursor: pointer; font-family: inherit; font-size: 0.9rem; transition: var(--transition-fast);">
                                        Supprimer
                                    </button>
                                </form>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" style="padding: 2rem; text-align: center; color: var(--color-gray-500);">
                            Aucun utilisateur trouvé
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top: 2rem;">
            {{ $users->links() }}
        </div>
    </div>
</section>
@endsection
