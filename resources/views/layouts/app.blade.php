<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Solideo Digital - Solutions. Développement. Excellence.')</title>
    <meta name="description" content="@yield('description', 'Solideo Digital - Développement web, montage PC sur mesure et formations en développement')">

    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    @stack('styles')
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="navbar-container">
            <a href="{{ route('home') }}" class="navbar-logo">
                <svg class="logo-svg" width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                    <text x="25" y="35" text-anchor="middle" class="logo-text-stroke" style="font-family: 'Inter', sans-serif; font-weight: 800; font-size: 28px; fill: none; stroke: var(--color-gold); stroke-width: 2;">SD</text>
                </svg>
                <span style="color: var(--color-navy);">SOLIDEO DIGITAL</span>
            </a>

            <!-- Mobile Menu Button -->
            <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Menu">
                <span></span>
                <span></span>
                <span></span>
            </button>

            <!-- Desktop Menu -->
            <ul class="navbar-menu" id="navbarMenu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a></li>
                <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}">Services</a></li>
                <li><a href="{{ route('projects') }}" class="{{ request()->routeIs('projects*') ? 'active' : '' }}">Portfolio</a></li>
                <li><a href="{{ route('blog') }}" class="{{ request()->routeIs('blog*') ? 'active' : '' }}">Blog</a></li>
                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">À propos</a></li>
                <li><a href="{{ route('contact') }}" class="btn btn-primary">Contact</a></li>

                @auth
                    <li><a href="{{ route('admin.dashboard') }}" style="color: var(--color-gold); font-weight: 600;">Dashboard</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                            @csrf
                            <button type="submit" style="background: none; border: none; color: var(--color-navy); font-weight: 500; cursor: pointer; font-family: inherit; font-size: inherit; padding: 0;">
                                Déconnexion
                            </button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" style="color: var(--color-gold); font-weight: 600;">Connexion</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-section">
                <h3>Solideo Digital</h3>
                <p>Solutions. Développement. Excellence.</p>
                <p>Votre partenaire technologique pour le développement web, le montage PC sur mesure et les formations professionnelles.</p>
            </div>

            <div class="footer-section">
                <h3>Services</h3>
                <a href="{{ route('services') }}">Développement Web</a><br>
                <a href="{{ route('services') }}">Montage PC sur Mesure</a><br>
                <a href="{{ route('services') }}">Formations & Assistance</a>
            </div>

            <div class="footer-section">
                <h3>Liens Rapides</h3>
                <a href="{{ route('projects') }}">Portfolio</a><br>
                <a href="{{ route('blog') }}">Blog</a><br>
                <a href="{{ route('about') }}">À propos</a><br>
                <a href="{{ route('contact') }}">Contact</a>
            </div>

            <div class="footer-section">
                <h3>Contact</h3>
                <p>Email: contact@solideo-digital.com</p>
                <p>Téléphone: +33 (0)X XX XX XX XX</p>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} Solideo Digital. Tous droits réservés.</p>
        </div>
    </footer>

    <script>
        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Mobile menu toggle
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navbarMenu = document.getElementById('navbarMenu');

        mobileMenuBtn.addEventListener('click', function() {
            navbarMenu.classList.toggle('active');
            mobileMenuBtn.classList.toggle('active');
        });

        // Close mobile menu when clicking on a link
        document.querySelectorAll('.navbar-menu a').forEach(link => {
            link.addEventListener('click', () => {
                navbarMenu.classList.remove('active');
                mobileMenuBtn.classList.remove('active');
            });
        });

        // Animation automatique des titres hero sur toutes les pages
        document.addEventListener('DOMContentLoaded', function() {
            // Fonction pour animer un titre lettre par lettre
            function animateTitle(titleElement) {
                if (!titleElement || titleElement.querySelector('span')) return; // Déjà animé

                const text = titleElement.textContent;
                titleElement.textContent = '';
                titleElement.classList.add('animated');

                // Découper le texte en lettres
                for (let char of text) {
                    const span = document.createElement('span');
                    span.textContent = char;
                    titleElement.appendChild(span);
                }
            }

            // Animer tous les titres hero (sauf page d'accueil qui a déjà les spans)
            const heroTitles = document.querySelectorAll('.hero-title:not(.hero-title-animated)');
            heroTitles.forEach(animateTitle);

            // Animer tous les sous-titres hero
            const heroSubtitles = document.querySelectorAll('.hero-subtitle:not(.hero-tagline-animated)');
            heroSubtitles.forEach(subtitle => {
                if (subtitle.closest('.hero')) {
                    subtitle.classList.add('animated');
                }
            });
        });

        // Optimisation performance: retirer will-change après animations
        window.addEventListener('load', function() {
            setTimeout(() => {
                // Logo SD stroke
                const logoStroke = document.querySelector('.logo-text-stroke');
                if (logoStroke) logoStroke.classList.add('animated');

                // Tous les titres animés
                const animatedTitles = document.querySelectorAll('.hero-title.animated, .hero-title-animated');
                animatedTitles.forEach(title => title.classList.add('animation-complete'));

                // Tous les slogans animés
                const animatedSubtitles = document.querySelectorAll('.hero-subtitle.animated, .hero-tagline-animated');
                animatedSubtitles.forEach(subtitle => subtitle.classList.add('animation-complete'));
            }, 2500);
        });
    </script>

    @stack('scripts')
</body>
</html>
