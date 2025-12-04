# Animations Solideo Digital

Ce document décrit les animations implémentées sur le site Solideo Digital.

## 1. Logo "SD" - Stroke Draw Animation

**Localisation:** Navbar (toutes les pages)

**Description:**
- Le contour des lettres "SD" se dessine progressivement au chargement de la page
- Durée: 0.8 secondes
- Effet: Stroke animation avec remplissage progressif

**Implémentation:**
- SVG text avec `stroke-dasharray` et `stroke-dashoffset`
- Animation CSS `strokeDraw` dans [public/css/animations.css](public/css/animations.css)

**Code:**
```html
<svg class="logo-svg">
    <text class="logo-text-stroke">SD</text>
</svg>
```

## 2. Titre "SOLIDEO DIGITAL" - Rotation 3D

**Localisation:** Page d'accueil - Section Hero

**Description:**
- Chaque lettre apparaît successivement avec une rotation 3D (axe Y)
- Effet "stagger" avec 0.05s de décalage entre chaque lettre
- Durée totale: ~1 seconde

**Caractéristiques:**
- Perspective 3D: 1000px
- Rotation de 90deg à 0deg
- Fade-in simultané (opacity 0 → 1)
- Translation verticale pour plus de dynamisme

**Implémentation:**
```html
<h1 class="hero-title-animated">
    <span>S</span><span>O</span><span>L</span>...
</h1>
```

## 3. Slogan - Fade-in + Letter Tracking

**Localisation:** Page d'accueil - Section Hero

**Description:**
- "Solutions. Développement. Excellence."
- Fade-in lent (1.2 secondes)
- Effet de tracking (espacement des lettres) qui s'élargit puis se stabilise
- Symbolise la précision et l'excellence

**Détails technique:**
- Démarre avec letter-spacing: -0.05em
- Expand à letter-spacing: 0.15em (50% de l'animation)
- Stabilise à letter-spacing: 0.1em (final)
- Délai: 1 seconde (après le titre)

**Implémentation:**
```html
<p class="hero-tagline-animated">Solutions. Développement. Excellence.</p>
```

## Optimisations Performance

### GPU Acceleration
Toutes les animations utilisent `will-change: transform, opacity` pour activer l'accélération GPU.

### Cleanup
Après 2.5 secondes, `will-change` est automatiquement retiré via JavaScript pour libérer les ressources:

```javascript
setTimeout(() => {
    element.classList.add('animated');
}, 2500);
```

### Accessibility
Support de `prefers-reduced-motion` pour les utilisateurs sensibles aux animations:

```css
@media (prefers-reduced-motion: reduce) {
    /* Animations désactivées */
}
```

## Timeline des Animations

```
0s    : Chargement de la page
0.2s  : Début stroke draw logo "SD"
0.1s  : Début rotation 3D "SOLIDEO DIGITAL"
1.0s  : Début fade-in slogan
1.0s  : Fin stroke draw logo
1.1s  : Fin rotation 3D titre
2.2s  : Fin fade-in slogan
2.5s  : Cleanup will-change
```

## Responsive

### Mobile (< 768px)
- Titre réduit à 2.5rem
- Espacement automatique entre "SOLIDEO" et "DIGITAL"
- Même durée d'animations

### Tablette (768px - 1024px)
- Animations identiques au desktop
- Menu burger activé

## Fichiers Concernés

- **CSS:** `/public/css/animations.css`
- **Layout:** `/resources/views/layouts/app.blade.php`
- **Page Home:** `/resources/views/home.blade.php`

## Support Navigateurs

✅ Chrome/Edge (88+)
✅ Firefox (85+)
✅ Safari (14+)
✅ Opera (74+)

Les animations dégradent gracieusement sur les anciens navigateurs.

## Mise à Jour: Animations Étendues à Toutes les Pages

### Animation Automatique des Titres

Désormais, **toutes les pages publiques** bénéficient automatiquement des animations:

#### Pages concernées:
- ✅ Page d'accueil (/)
- ✅ Services (/services)
- ✅ Portfolio (/portfolio)
- ✅ Blog (/blog)
- ✅ Contact (/contact)
- ✅ À propos (/about)
- ✅ Pages de détail (service, projet, article)
- ✅ Prise de rendez-vous (/rendez-vous)

#### Fonctionnement automatique:

Le JavaScript dans `layouts/app.blade.php` détecte automatiquement:

1. **Tous les `.hero-title`** → Animation 3D lettre par lettre
2. **Tous les `.hero-subtitle` dans hero** → Animation fade-in + tracking

Aucune modification manuelle nécessaire sur les pages individuelles!

### Code JavaScript

```javascript
// Animation automatique au chargement de la page
document.addEventListener('DOMContentLoaded', function() {
    // Animer les titres hero
    const heroTitles = document.querySelectorAll('.hero-title:not(.hero-title-animated)');
    heroTitles.forEach(titleElement => {
        const text = titleElement.textContent;
        titleElement.textContent = '';
        titleElement.classList.add('animated');
        
        // Découper en lettres
        for (let char of text) {
            const span = document.createElement('span');
            span.textContent = char;
            titleElement.appendChild(span);
        }
    });
    
    // Animer les sous-titres
    const heroSubtitles = document.querySelectorAll('.hero-subtitle:not(.hero-tagline-animated)');
    heroSubtitles.forEach(subtitle => {
        if (subtitle.closest('.hero')) {
            subtitle.classList.add('animated');
        }
    });
});
```

### Avantages

✅ **Cohérence visuelle** - Même expérience premium sur tout le site
✅ **Maintenance facilitée** - Une seule source d'animation
✅ **Performance** - Cleanup automatique après 2.5s
✅ **Responsive** - Fonctionne sur tous les écrans
✅ **Accessibilité** - Support prefers-reduced-motion

