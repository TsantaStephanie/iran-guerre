<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // [OK] Catégories avec slugs
        $categories = [
            ['name' => 'Actualités', 'slug' => 'actualites'],
            ['name' => 'Analyse & Contexte', 'slug' => 'analyse-contexte'],
            ['name' => 'Humanitaire', 'slug' => 'humanitaire'],
            ['name' => 'Chronologie', 'slug' => 'chronologie'],
        ];

        foreach ($categories as $categoryData) {
            Category::firstOrCreate(
                ['slug' => $categoryData['slug']],
                ['name' => $categoryData['name']]
            );
        }

        // [OK] Articles de test avec SEO
        $articles = [
            [
                'title' => 'L\'impact des tensions régionales sur le détroit d\'Ormuz',
                'slug' => 'tensions-detroit-ormuz',
                'content' => 'Le détroit d\'Ormuz, situé entre l\'Iran et Oman, demeure une zone géopolitique critique. Les tensions entre l\'Iran et les puissances occidentales ont un impact direct sur le commerce maritime mondial.

                            La route maritime représente 30% du trafic pétrolier mondial. Les tensions actuelles créent une instabilité économique majeure.',
                'img_url' => 'https://via.placeholder.com/600x400?text=Detroit+Ormuz',
                'img_alt' => 'Carte du détroit d\'Ormuz avec routes maritimes',
                'meta_title' => 'Tensions Iran - Détroit d\'Ormuz | War News',
                'meta_description' => 'Analyse de l\'impact des tensions géopolitiques iranienne sur le détroit d\'Ormuz et le commerce maritime mondial.',
                'category_slug' => 'actualites',
            ],
            [
                'title' => 'Chronologie du conflit iranien',
                'slug' => 'chronologie-conflit-iranien',
                'content' => '1979 - Révolution islamique en Iran
                            1980-1988 - Guerre Iran-Irak
                            2002 onwards - Programme nucléaire iranien
                            2015 - Accord nucléaire (JCPOA)
                            2018 - Retrait américain de l\'accord
                            2026 - Nouvelles tensions régionales',
                'img_url' => 'https://via.placeholder.com/600x400?text=Chronologie',
                'img_alt' => 'Tableau chronologique des événements majeurs en Iran',
                'meta_title' => 'Chronologie du conflit iranien | War News',
                'meta_description' => 'Frise chronologique des événements majeurs du conflit iranien depuis 1979.',
                'category_slug' => 'chronologie',
            ],
            [
                'title' => 'Crise humanitaire en Iran',
                'slug' => 'crise-humanitaire-iran',
                'content' => 'La situation humanitaire en Iran connaît une détérioration progressive. Les sanctions internationales impactent l\'accès aux ressources médicales et alimentaires.

                            Les organisations humanitaires alertent sur une urgence sanitaire croissante.',
                'img_url' => 'https://via.placeholder.com/600x400?text=Crise+Humanitaire',
                'img_alt' => 'Manifestation pour l\'aide humanitaire en Iran',
                'meta_title' => 'Crise humanitaire en Iran | War News',
                'meta_description' => 'État de la crise humanitaire en Iran : impact des sanctions sur la population civile.',
                'category_slug' => 'humanitaire',
            ],
            [
                'title' => 'Analyse : Les enjeux stratégiques du conflit',
                'slug' => 'analyse-enjeux-strategiques',
                'content' => 'Au-delà des enjeux régionaux immédiats, le conflit iranien révèle des luttes d\'influence globales.

                            Les acteurs: États-Unis, Chine, Russie, puissances européennes. Chacun cherche à protéger ses intérêts géopolitiques et économiques.',
                'img_url' => 'https://via.placeholder.com/600x400?text=Analyse+Strategique',
                'img_alt' => 'Carte des alliances géopolitiques au Moyen-Orient',
                'meta_title' => 'Analyse stratégique du conflit iranien | War News',
                'meta_description' => 'Analyse approfondie des enjeux géopolitiques et stratégiques du conflit iranien.',
                'category_slug' => 'analyse-contexte',
            ],
        ];

        foreach ($articles as $articleData) {
            $categorySlug = $articleData['category_slug'];
            unset($articleData['category_slug']);

            $category = Category::where('slug', $categorySlug)->first();

            if ($category) {
                Article::firstOrCreate(
                    ['slug' => $articleData['slug']],
                    array_merge($articleData, ['category_id' => $category->id])
                );
            }
        }
    }
}
