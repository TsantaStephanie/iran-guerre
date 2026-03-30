<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

// [OK] URL Rewriting: Page d'accueil avec liste des articles
Route::get('/', [ArticleController::class, 'index'])->name('home');

// [OK] URL Rewriting: Article via slug (ex: /articles/tensions-detroit-ormuz)
Route::get('/articles/{slug}', [ArticleController::class, 'show'])->name('articles.show');

// [OK] URL Rewriting: Catégories via slug (ex: /categories/actualites)
Route::get('/categories/{categorySlug}', [ArticleController::class, 'byCategory'])->name('articles.category');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
