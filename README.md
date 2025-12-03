# Solideo Digital

**Solutions. Développement. Excellence.**

Site web d'entreprise pour Solideo Digital, spécialisée dans le développement web, le montage PC sur mesure et les formations.

## 🎨 Design

Le site utilise une palette de couleurs élégante basée sur le logo :
- **Or** : `#B8935E` - Couleur principale, évoque l'excellence et le premium
- **Bleu Marine** : `#1A2B3C` - Couleur secondaire, professionnalisme et confiance
- **Beige** : `#F5F0E8` - Couleur d'accent douce

## 🚀 Fonctionnalités

### Frontend Public
- ✅ Page d'accueil avec présentation des services
- ✅ Page À propos
- 🚧 Page Services (détail des 3 catégories)
- 🚧 Portfolio/Projets (filtrable par technologie)
- 🚧 Blog/Actualités
- 🚧 Formulaire de contact
- 🚧 Système de prise de rendez-vous (pour dépannage PC)
- 🚧 Section témoignages clients

### Espace Administration (À développer)
- 🚧 Dashboard admin
- 🚧 Gestion des services
- 🚧 Gestion du portfolio
- 🚧 Gestion du blog
- 🚧 Gestion des témoignages
- 🚧 Gestion des rendez-vous
- 🚧 Gestion des contacts

## 📋 Services Proposés

### 1. Développement Web
- **Laravel** (PHP) - Applications web robustes
- **WebAssembly** (C#/Blazor) - Applications haute performance
- **Spring Boot** (Java) - Solutions d'entreprise

### 2. PC sur Mesure
- Configuration et montage de PC personnalisés
- Dépannage informatique
- Maintenance et upgrade

### 3. Formations & Assistance
- Micro-formations techniques
- Assistance personnalisée
- Accompagnement projet

## 🛠️ Technologies

- **Framework** : Laravel 11
- **Base de données** : SQLite (dev) / MySQL ou PostgreSQL (production)
- **Frontend** : HTML5, CSS3 (variables CSS), JavaScript vanilla
- **Design** : Style moderne et tech-innovant

## 📦 Structure de la Base de Données

### Tables principales
- `services` - Services offerts (web, pc, formation)
- `projects` - Portfolio de projets réalisés
- `blog_posts` - Articles de blog
- `testimonials` - Témoignages clients
- `appointments` - Rendez-vous (dépannage PC)
- `contacts` - Messages de contact
- `users` - Utilisateurs admin

## ⚙️ Installation

```bash
# Cloner le projet
cd /chemin/vers/solideo-digital

# Installer les dépendances
composer install

# Configurer l'environnement
cp .env.example .env
php artisan key:generate

# Créer la base de données SQLite
touch database/database.sqlite

# Exécuter les migrations
php artisan migrate

# Lancer le serveur de développement
php artisan serve
```

Le site sera accessible sur `http://127.0.0.1:8000`

## 🎯 Prochaines Étapes

### Frontend
1. Créer les pages Services avec filtres par catégorie
2. Créer le Portfolio avec système de filtres (Laravel/WebAssembly/SpringBoot/PC)
3. Créer le Blog avec système de catégories et tags
4. Créer le formulaire de contact fonctionnel
5. Créer le système de prise de rendez-vous avec calendrier
6. Ajouter les images du logo dans le header

### Backend Admin
1. Créer le système d'authentification admin
2. Créer le dashboard avec statistiques
3. Créer les CRUD pour tous les modules
4. Ajouter l'upload d'images pour projets/blog
5. Ajouter un éditeur WYSIWYG pour le contenu

### Optimisations
1. Ajouter un système de cache
2. Optimiser les images
3. Ajouter le SEO (meta tags, sitemap)
4. Ajouter Google Analytics
5. Configurer les emails (contact, rendez-vous)
6. Ajouter la version responsive (mobile menu)

## 📝 Notes

- Le projet est configuré avec SQLite pour le développement
- Les couleurs sont définies dans `public/css/variables.css`
- Les styles sont dans `public/css/style.css`
- Le layout principal est `resources/views/layouts/app.blade.php`

## 📧 Contact

Site en cours de développement pour Solideo Digital.

---

**Status** : 🚧 En développement actif

**Dernière mise à jour** : 03 Décembre 2025
# SD-Solideo-Digital
