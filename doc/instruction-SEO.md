Pour réussir votre Front-Office et valider les points du barème concernant le référencement et la navigation, voici les deux listes de contrôle indispensables basées sur vos documents de cours.

1. Checklist pour un "Bon SEO" (On-Page & Technique)
L'optimisation pour les moteurs de recherche est l'un des trois piliers majeurs du succès de votre site.

    - Balise <title> unique : Chaque page doit avoir un titre spécifique qui décrit son contenu.
    - Meta description : Utilisez une balise <meta name="description"> de moins de 160 caractères pour résumer la page.
    - Hiérarchie Hn logique :
        - Un seul H1 par page contenant votre mot-clé principal.
        - Une structure descendante cohérente de H2 à H6 pour organiser vos sections.
    - Attribut Alt des images : Toutes vos images doivent avoir un texte alternatif descriptif (colonne img_alt dans votre SQL).

    - Mobile Responsive : Votre design doit s'adapter parfaitement aux écrans mobiles.
    - Performance (Lighthouse) : Vous devez viser un bon score de performance (LCP < 2.5s) lors de vos tests locaux.

2. Checklist pour un "Bon Rewriting" (URL Normalisée)
L'URL Rewriting (réécriture d'URL) sert à transformer des adresses techniques complexes en liens lisibles par l'humain et les moteurs.


    - Lisibilité et Simplicité : L'URL doit être courte et facile à comprendre pour l'utilisateur.
    - Utilisation de mots-clés : Remplacez les IDs numériques par des mots descriptifs (le slug).
    - Séparateurs de mots : Utilisez des tirets - pour séparer les mots dans l'URL (ex: article-guerre-iran.html).

Masquage de la technologie : L'URL ne doit pas laisser apparaître les extensions de fichiers comme .php ou les paramètres comme ?id=12.
Exemple de transformation :
Mauvais : http://site.com/article.php?id=5.
Bon (Rewritten) : http://site.com/articles/tensions-detroit-ormuz.