<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    /**
     * Afficher la liste des articles (page d'accueil)
     * [OK] SEO: Titre unique, H1 unique, meta description
     */
    public function index()
    {
        $categories = Category::with('articles')->get();
        $articles = Article::latest()->paginate(6);

        return view('articles.index', [
            'articles' => $articles,
            'categories' => $categories,
            'title' => 'Actualités - Guerre Iran',
            'meta_description' => 'Suivez l\'actualité et l\'analyse du conflit en Iran. Articles de référence, chronologie et humanitaire.'
        ]);
    }

    /**
     * Afficher un article via son slug
     * [OK] URL Rewriting: /articles/tensions-detroit-ormuz
     * [OK] SEO: Titre, H1, meta description dynamiques
     */
    public function show($slug)
    {
        $article = Article::where('slug', $slug)
            ->firstOrFail();

        $categories = Category::all();
        $relatedArticles = Article::where('category_id', $article->category_id)
            ->where('id', '!=', $article->id)
            ->limit(3)
            ->get();

        return view('articles.show', [
            'article' => $article,
            'categories' => $categories,
            'relatedArticles' => $relatedArticles,
            'title' => $article->meta_title ?? $article->title,
            'meta_description' => $article->meta_description
        ]);
    }

    /**
     * Afficher les articles d'une catégorie
     * [OK] URL Rewriting: /categories/actualites
     */
    public function byCategory($categorySlug)
    {
        $category = Category::where('slug', $categorySlug)
            ->firstOrFail();

        $articles = $category->articles()->paginate(6);
        $categories = Category::all();

        return view('articles.category', [
            'category' => $category,
            'articles' => $articles,
            'categories' => $categories,
            'title' => ucfirst($category->name),
            'meta_description' => 'Articles de la catégorie ' . $category->name . ' - Guerre en Iran'
        ]);
    }
}
