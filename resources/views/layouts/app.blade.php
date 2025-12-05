<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Solideo Digital - Solutions. Développement. Excellence.')</title>
    <meta name="description" content="@yield('description', 'Solideo Digital - Développement web, montage PC sur mesure et formations en développement')">

    <!-- Favicons - Image haute résolution pour meilleure visibilité -->
    <link rel="icon" type="image/png" sizes="196x196" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="128x128" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('favicon.png') }}">
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('favicon.png') }}">
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <meta name="theme-color" content="#1e3a5f">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-title" content="Solideo Digital">
    <meta name="msapplication-TileColor" content="#1e3a5f">
    <meta name="msapplication-TileImage" content="{{ asset('favicon.png') }}">

    <link rel="stylesheet" href="{{ asset('css/variables.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animations.css') }}">
    @stack('styles')
</head>
<body>
    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="scrollProgress"></div>

    <!-- Navigation -->
    <nav class="navbar" id="navbar">
        <div class="navbar-container">
            <a href="{{ route('home') }}" class="navbar-logo">
                <svg class="logo-svg" width="50" height="50" viewBox="0 0 50 50" xmlns="http://www.w3.org/2000/svg">
                    <text x="25" y="35" text-anchor="middle" class="logo-text-stroke" style="font-family: 'Inter', sans-serif; font-weight: 800; font-size: 28px; fill: none; stroke: var(--color-gold); stroke-width: 2;">SD</text>
                </svg>
                <span style="color: var(--color-navy);">SOLIDEO DIGITAL</span>
            </a>

            <div class="navbar-actions">
                <a href="{{ route('contact') }}" class="btn btn-primary btn-contact-mobile">Contact</a>
                <button class="hamburger" id="hamburger" aria-label="Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
            </div>

            <ul class="navbar-menu" id="navbarMenu">
                <li><a href="{{ route('home') }}" class="{{ request()->routeIs('home') ? 'active' : '' }}">Accueil</a></li>
                <li><a href="{{ route('services') }}" class="{{ request()->routeIs('services*') ? 'active' : '' }}">Services</a></li>

                <!-- Dropdown Réalisations -->
                <li class="nav-dropdown">
                    <a href="#" class="dropdown-toggle {{ request()->routeIs('projects*') || request()->routeIs('testimonials') ? 'active' : '' }}">
                        Réalisations
                        <svg class="dropdown-icon" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
                            <path d="M6 8L2 4h8L6 8z"/>
                        </svg>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-grid">
                            <a href="{{ route('projects') }}" class="dropdown-item">
                                <span class="dropdown-icon-wrapper">💼</span>
                                <div>
                                    <strong>Portfolio</strong>
                                    <small>Découvrez nos projets réalisés</small>
                                </div>
                            </a>
                            <a href="{{ route('testimonials') }}" class="dropdown-item">
                                <span class="dropdown-icon-wrapper">⭐</span>
                                <div>
                                    <strong>Témoignages</strong>
                                    <small>Avis de nos clients</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>

                <!-- Dropdown Ressources -->
                <li class="nav-dropdown">
                    <a href="#" class="dropdown-toggle {{ request()->routeIs('blog*') ? 'active' : '' }}">
                        Ressources
                        <svg class="dropdown-icon" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
                            <path d="M6 8L2 4h8L6 8z"/>
                        </svg>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-grid">
                            <a href="{{ route('blog') }}" class="dropdown-item">
                                <span class="dropdown-icon-wrapper">📝</span>
                                <div>
                                    <strong>Blog</strong>
                                    <small>Articles et actualités tech</small>
                                </div>
                            </a>
                            <a href="#" class="dropdown-item disabled">
                                <span class="dropdown-icon-wrapper">📚</span>
                                <div>
                                    <strong>Guides</strong>
                                    <small>Bientôt disponible</small>
                                </div>
                            </a>
                        </div>
                    </div>
                </li>

                <li><a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">À propos</a></li>
                <li><a href="{{ route('contact') }}" class="btn btn-primary">Contact</a></li>

                <!-- User Menu -->
                @auth
                    <li class="nav-dropdown user-menu">
                        <a href="#" class="user-avatar-btn">
                            <div style="display: flex; align-items: center; gap: 0.75rem;">
                                <div class="user-avatar">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </div>
                                <span class="user-menu-label">Mon compte</span>
                            </div>
                            <svg class="dropdown-icon" width="12" height="12" viewBox="0 0 12 12" fill="currentColor">
                                <path d="M6 8L2 4h8L6 8z"/>
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <div class="dropdown-user-info">
                                <strong>{{ auth()->user()->name }}</strong>
                                <small>{{ auth()->user()->email }}</small>
                            </div>
                            <div class="dropdown-divider"></div>
                            @if(auth()->user()->is_admin)
                                <a href="{{ route('admin.dashboard') }}" class="dropdown-item">
                                    <span class="dropdown-icon-wrapper">📊</span>
                                    <span>Dashboard</span>
                                </a>
                            @endif
                            <a href="{{ route('admin.profile.edit') }}" class="dropdown-item">
                                <span class="dropdown-icon-wrapper">👤</span>
                                <span>Mon profil</span>
                            </a>
                            <div class="dropdown-divider"></div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="dropdown-item dropdown-item-logout">
                                    <span class="dropdown-icon-wrapper">🚪</span>
                                    <span>Déconnexion</span>
                                </button>
                            </form>
                        </div>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="btn btn-secondary">Connexion</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <!-- Main Content -->
    <main style="position: relative; z-index: 1;">
        @yield('content')
    </main>

    <!-- Scroll to Top Button -->
    <button class="scroll-to-top" id="scrollToTop" aria-label="Retour en haut">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
            <path d="M12 19V5M5 12l7-7 7 7"/>
        </svg>
    </button>

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
        // =============================================
        // NAVIGATION MODERNE - JAVASCRIPT
        // =============================================

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // Scroll Progress Bar
        window.addEventListener('scroll', function() {
            const scrollProgress = document.getElementById('scrollProgress');
            const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            const scrollHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrollPercent = (scrollTop / scrollHeight);
            scrollProgress.style.transform = `scaleX(${scrollPercent})`;
        });

        // Scroll to Top Button
        const scrollToTopBtn = document.getElementById('scrollToTop');
        window.addEventListener('scroll', function() {
            if (window.scrollY > 500) {
                scrollToTopBtn.classList.add('visible');
            } else {
                scrollToTopBtn.classList.remove('visible');
            }
        });

        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });

        // Menu Off-Canvas pour mobile/tablette
        const hamburger = document.getElementById('hamburger');
        const navbarMenu = document.getElementById('navbarMenu');

        if (hamburger) {
            hamburger.addEventListener('click', function() {
                hamburger.classList.toggle('active');
                navbarMenu.classList.toggle('open');
                document.body.style.overflow = navbarMenu.classList.contains('open') ? 'hidden' : '';
            });
        }

        // Fermer le menu quand on clique sur l'overlay
        if (navbarMenu) {
            navbarMenu.addEventListener('click', function(e) {
                if (e.target === navbarMenu && window.innerWidth <= 1024) {
                    hamburger.classList.remove('active');
                    navbarMenu.classList.remove('open');
                    document.body.style.overflow = '';
                }
            });
        }

        // Toggle des dropdowns en mobile
        document.querySelectorAll('.nav-dropdown .dropdown-toggle').forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                if (window.innerWidth <= 1024) {
                    e.preventDefault();
                    const dropdown = this.closest('.nav-dropdown');
                    dropdown.classList.toggle('open');
                }
            });
        });

        // Toggle du user menu en mobile
        document.querySelectorAll('.user-menu .user-avatar-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                if (window.innerWidth <= 1024) {
                    e.preventDefault();
                    const userMenu = this.closest('.user-menu');
                    userMenu.classList.toggle('open');
                }
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
