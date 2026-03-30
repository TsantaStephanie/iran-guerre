1. Intégration du Design & Navigation (Figma vers Laravel)
Affichage Dynamique : Créer l'interface visuelle (Blade) pour afficher les articles stockés en base de données (titre, contenu, date).

Menu par Catégories : Générer un menu de navigation dynamique basé sur la table categories (Actualités, Analyse & Contexte, Humanitaire, Chronologie).

Design Responsive : Implémenter une grille d'affichage qui s'adapte aux mobiles et ordinateurs (Point 6 du barème et critère technique SEO).

Accès Back-Office : Intégrer un bouton "Se connecter" pointant vers l'interface d'administration (BO).

2. Structure Sémantique & Hiérarchie (Points Barème 2 & 3)
Balise <h1> Unique : Garantir un seul titre principal par page contenant le mot-clé de l'article pour le référencement.

Hiérarchie Hn Logique : Organiser le contenu avec une structure descendante cohérente (H2 pour les sections, H3 pour les sous-titres) sans sauter de niveau.

Titres de Page dynamiques : Utiliser la balise <title> de façon unique pour chaque page afin de décrire précisément son contenu.

3. URL Rewriting / Normalisation (Point Barème 1)
Utilisation du slug : Remplacer les IDs techniques (ex: id=12) par des slugs lisibles (ex: tensions-iran) extraits de votre table SQL.

Simplification des URLs : Masquer la technologie (pas de .php ou .html inutiles) et utiliser des tirets - comme séparateurs pour faciliter la lecture humaine et robotique.

4. SEO Technique & Accessibilité (Points Barème 4 & 5)
Balises Meta Description : Insérer la balise <meta name="description"> dans le <head> (moins de 160 caractères) en récupérant la donnée meta_description de la base.

Accessibilité Images : Renseigner systématiquement l'attribut alt des balises <img> avec la colonne img_alt pour l'accessibilité et le SEO.

5. Tests & Livrables (Point Barème 6)
Audit Lighthouse : Réaliser des tests en local pour valider les performances (LCP < 2.5s), l'accessibilité et le SEO sur mobile et ordinateur.

Preuves de Travail : Préparer des captures d'écran du Front-Office (FO) et documenter vos choix techniques (gestion du responsive et du rewriting) pour le dossier final.