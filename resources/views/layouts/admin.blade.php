<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin - Solideo Digital')</title>
    <meta name="description" content="Administration Solideo Digital">

    <!-- Favicons - Image haute résolution pour meilleure visibilité -->
    <link rel="icon" type="image/png" sizes="196x196" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="128x128" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <meta name="theme-color" content="#1e3a5f">
    <meta name="msapplication-TileColor" content="#1e3a5f">
    <meta name="msapplication-TileImage" content="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    @stack('styles')
</head>
<body class="admin-body">
    <!-- Admin Navigation -->
    <nav class="admin-navbar" id="adminNavbar">
        <div class="admin-navbar-container">
            <a href="{{ route('admin.dashboard') }}" class="admin-logo">
                <span style="color: var(--color-gold); font-weight: 800;">SD</span>
                <span style="color: white;">ADMIN</span>
            </a>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <!-- Admin Menu -->
            <ul class="admin-menu" id="adminMenu">
                <li><a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="menu-icon">📊</span> Dashboard
                </a></li>
                <li><a href="{{ route('admin.services.index') }}" class="{{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                    <span class="menu-icon">🛠️</span> Services
                </a></li>
                <li><a href="{{ route('admin.projects.index') }}" class="{{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                    <span class="menu-icon">💼</span> Projets
                </a></li>
                <li><a href="{{ route('admin.blog.index') }}" class="{{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
                    <span class="menu-icon">📝</span> Blog
                </a></li>
                <li><a href="{{ route('admin.testimonials.index') }}" class="{{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                    <span class="menu-icon">⭐</span> Témoignages
                </a></li>
                <li><a href="{{ route('admin.contacts.index') }}" class="{{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                    <span class="menu-icon">📧</span> Contacts
                </a></li>
                <li><a href="{{ route('admin.appointments.index') }}" class="{{ request()->routeIs('admin.appointments*') ? 'active' : '' }}">
                    <span class="menu-icon">📅</span> Rendez-vous
                </a></li>
                <li class="menu-divider"></li>
                <li><a href="{{ route('home') }}" target="_blank">
                    <span class="menu-icon">🌐</span> Voir le site
                </a></li>
                <li>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="admin-logout-btn">
                            <span class="menu-icon">🚪</span> Déconnexion
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Admin Sidebar (Desktop) -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-header">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
                <span style="color: var(--color-gold); font-weight: 800; font-size: 1.5rem;">SD</span>
                <span style="color: var(--color-navy); font-size: 0.9rem; font-weight: 600;">ADMIN</span>
            </a>
        </div>

        <nav class="sidebar-nav">
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <span class="sidebar-icon">📊</span>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.services.index') }}" class="sidebar-link {{ request()->routeIs('admin.services*') ? 'active' : '' }}">
                <span class="sidebar-icon">🛠️</span>
                <span>Services</span>
            </a>
            <a href="{{ route('admin.projects.index') }}" class="sidebar-link {{ request()->routeIs('admin.projects*') ? 'active' : '' }}">
                <span class="sidebar-icon">💼</span>
                <span>Projets</span>
            </a>
            <a href="{{ route('admin.blog.index') }}" class="sidebar-link {{ request()->routeIs('admin.blog*') ? 'active' : '' }}">
                <span class="sidebar-icon">📝</span>
                <span>Blog</span>
            </a>
            <a href="{{ route('admin.testimonials.index') }}" class="sidebar-link {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                <span class="sidebar-icon">⭐</span>
                <span>Témoignages</span>
            </a>
            <a href="{{ route('admin.contacts.index') }}" class="sidebar-link {{ request()->routeIs('admin.contacts*') ? 'active' : '' }}">
                <span class="sidebar-icon">📧</span>
                <span>Contacts</span>
            </a>
            <a href="{{ route('admin.appointments.index') }}" class="sidebar-link {{ request()->routeIs('admin.appointments*') ? 'active' : '' }}">
                <span class="sidebar-icon">📅</span>
                <span>Rendez-vous</span>
            </a>

            <div class="sidebar-divider"></div>

            <a href="{{ route('home') }}" target="_blank" class="sidebar-link">
                <span class="sidebar-icon">🌐</span>
                <span>Voir le site</span>
            </a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="sidebar-link sidebar-logout">
                    <span class="sidebar-icon">🚪</span>
                    <span>Déconnexion</span>
                </button>
            </form>
        </nav>

        <div class="sidebar-footer">
            <p style="font-size: 0.75rem; color: var(--color-gray-500);">
                {{ auth()->user()->name }}
            </p>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="admin-main">
        <div class="admin-content">
            @yield('content')
        </div>
    </main>

    <script>
        // Mobile menu toggle for admin
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const adminMenu = document.getElementById('adminMenu');

        if (mobileMenuBtn && adminMenu) {
            mobileMenuBtn.addEventListener('click', function() {
                adminMenu.classList.toggle('active');
                mobileMenuBtn.classList.toggle('active');
            });

            // Close mobile menu when clicking on a link
            document.querySelectorAll('.admin-menu a').forEach(link => {
                link.addEventListener('click', () => {
                    adminMenu.classList.remove('active');
                    mobileMenuBtn.classList.remove('active');
                });
            });
        }
    </script>

    @stack('scripts')
</body>
</html>
