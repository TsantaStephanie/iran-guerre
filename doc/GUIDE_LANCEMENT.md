# 🚀 Guide de Lancement - Frontend Iran War

## Prérequis
- Docker Desktop en cours d'exécution
- Les conteneurs Docker doivent être lancés:
  ```powershell
  docker compose up -d
  ```

---

## 📦 Étape 1: Migrations de la base de données

Lance les migrations pour créer les tables (users, categories, articles):

```powershell
docker compose exec laravel.test php artisan migrate
```

**Output attendu**:
```
  Migrated: 0001_01_01_000000_create_users_table
  Migrated: 0001_01_01_000001_create_cache_table
  Migrated: 0001_01_01_000002_create_jobs_table
  Migrated: 2026_03_28_175152_create_personal_access_tokens_table
  Migrated: 2026_03_29_000001_create_categories_table
  Migrated: 2026_03_29_000002_create_articles_table
```

---

## 🌱 Étape 2: Seeders - Insérer les données de test

Lance les seeders pour remplir la base avec des articles et catégories:

```powershell
docker compose exec laravel.test php artisan db:seed
```

**Output attendu**:
```
  Seeded: Database\Seeders\ArticleSeeder
```

Cela crée:
- **Catégories**: Actualités, Analyse & Contexte, Humanitaire, Chronologie
- **Articles**: 4 articles de test avec les bonnes structure SEO

---

## 🎨 Étape 3: Compiler les assets CSS/JS

Compile Tailwind CSS et JavaScript avec Vite:

```powershell
docker compose exec laravel.test npm run build
```

**Output attendu**:
```
  vite v5.x.x
  ✓ built in XXms
```

---

## ✅ Étape 4: Vérifier que tout fonctionne

Lance un test rapide pour confirmer que l'app marche:

```powershell
docker compose exec laravel.test php artisan tinker
```

Puis dans tinker, vérifie le nombre d'articles:
```php
App\Models\Article::count()
```

**Output attendu**: `4` (ou le nombre d'articles dans les seeders)

Quitte tinker: `exit`

---

## 🌐 Étape 5: Ouvrir l'application

Accède à l'app dans ton navigateur:

```
http://localhost:8000
```

**Tu dois voir**:
- ✓ Header avec logo "WAR NEWS"
- ✓ Navigation dynamique (Actualités, Analyse & Contexte, Humanitaire, Chronologie)
- ✓ Grille de 4 articles
- ✓ Bouton "Se connecter" en haut à droite
- ✓ Responsive design (essaie de redimensionner la fenêtre)

---

## 📄 Étape 6: Tester une page article

Clique sur un article pour aller à la page détail:

**URL attendue**: 
```
http://localhost:8000/articles/tensions-detroit-ormuz
```

**Tu dois voir**:
- ✓ H1 unique (le titre de l'article)
- ✓ Catégorie (H2)
- ✓ Image avec alt
- ✓ Contenu formaté
- ✓ Articles liés en bas
- ✓ Breadcrumb (Accueil / Catégorie / Titre)

---

## 🏷️ Étape 7: Tester la navigation par catégorie

Clique sur une catégorie dans la navigation (ex: "Actualités"):

**URL attendue**:
```
http://localhost:8000/categories/actualites
```

**Tu dois voir**:
- ✓ H1: Nom de la catégorie
- ✓ Compteur d'articles
- ✓ Articles filtrés par catégorie
- ✓ Grille responsive

---

## 🔦 Étape 8: Audit Lighthouse (SEO)

1. Ouvre une page article dans le navigateur (ex: http://localhost:8000/articles/tensions-detroit-ormuz)
2. Appuie sur **F12** pour ouvrir DevTools
3. Va sur l'onglet **Lighthouse** (ou clic droit > Inspect, puis Lighthouse)
4. Sélectionne **"Mobile"** 
5. Clique **"Analyze page load"**

**Attends 30 secondes** que l'audit se termine.

**Tu dois voir** dans le rapport:
- ✓ **SEO**: Score > 90
  - [x] H1 présent
  - [x] Meta description présent
  - [x] Images avec alt
  - [x] Viewport meta tag
- ✓ **Accessibilité**: Score > 85
  - [x] Contraste des couleurs OK
  - [x] Alt images
- ✓ **Performance**: LCP < 2.5s (généralement OK en local)

---

## 🔑 Données de connexion (pour le back-office Filament)

**Email**: `admin@iranwar.test`  
**Password**: `password`

Pour y accéder (après installation de Filament):
```
http://localhost:8000/admin
```

---

## 📊 Structure des URLs SEO-friendly

| Page | URL | Type |
|------|-----|------|
| Accueil | `/` | GET |
| Article | `/articles/tenisions-detroit-ormuz` | GET |
| Catégorie | `/categories/actualites` | GET |
| Connexion | `/login` | GET |
| Tableau de bord | `/dashboard` | GET (authentifié) |

**Pas de paramètres techniques** (?id=12, .php, etc.) ✓

---

## 🐛 Troubleshooting

### Erreur: "Container not running"
```powershell
docker compose up -d
```

### Erreur: "vendor not found"
Le Dockerfile installe les dépendances automatiquement. Attends 1-2 min que le build se termine.

### Erreur: "Class ArticleController not found"
Vérifie que le fichier `app/Http/Controllers/ArticleController.php` existe et que les namespaces sont corrects.

### Pas de migrations
```powershell
docker compose exec laravel.test php artisan migrate --fresh
```
⚠️ Cela **supprime et recrée** les tables.

---

## ✨ Résumé des commandes

```powershell
# Lancer Docker
docker compose up -d

# Migrations
docker compose exec laravel.test php artisan migrate

# Seeders (données de test)
docker compose exec laravel.test php artisan db:seed

# Build CSS/JS
docker compose exec laravel.test npm run build

# Ouvrir l'app
# Navigue vers http://localhost:8000
```

---

**Date**: 29 Mars 2026  
**Status**: ✅ Guide complet pour le test
