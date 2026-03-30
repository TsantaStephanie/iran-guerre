@extends('layouts.main')

@section('content')
    <!-- [OK] H1 Unique: Titre principal de la page (SEO) -->
    <h1 class="text-4xl md:text-5xl font-bold mb-4 text-white">
        Actualités - Guerre en Iran
    </h1>
    
    <!-- [OK] Hiérarchie Hn: Sous-titre H2 -->
    <h2 class="text-xl text-gray-400 mb-12">
        Suivez l'analyse et la chronologie du conflit
    </h2>

    <!-- [OK] Design Responsive: Grille adaptée (1 col mobile, 2 col tablette, 3 col desktop) -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($articles as $article)
            <article class="bg-gray-800 rounded overflow-hidden hover:shadow-lg hover:shadow-red-600/50 transition transform hover:scale-105">
                <!-- [OK] Image avec alt (SEO) -->
                @if ($article->img_url)
                    <img src="{{ $article->img_url }}" 
                         alt="{{ $article->img_alt ?? $article->title }}"
                         class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-700 flex items-center justify-center">
                        <span class="text-gray-500">Pas d'image</span>
                    </div>
                @endif

                <!-- Contenu de la carte -->
                <div class="p-6">
                    <!-- Catégorie (H3) -->
                    <h3 class="text-sm font-semibold text-red-600 mb-2 uppercase">
                        {{ $article->category->name }}
                    </h3>

                    <!-- Titre (H4 avec lien vers article) -->
                    <h4 class="text-xl font-bold text-white mb-3 line-clamp-2 hover:text-red-600 transition">
                        <a href="{{ route('articles.show', $article->slug) }}">
                            {{ $article->title }}
                        </a>
                    </h4>

                    <!-- Meta description (aperçu) -->
                    <p class="text-gray-400 text-sm mb-4 line-clamp-2">
                        {{ $article->meta_description ?? Str::limit(strip_tags($article->content), 100) }}
                    </p>

                    <!-- Date -->
                    <time class="text-xs text-gray-500">
                        {{ $article->created_at->format('d M Y') }}
                    </time>

                    <!-- Lien "Lire plus" -->
                    <a href="{{ route('articles.show', $article->slug) }}" 
                       class="inline-block mt-4 px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition text-sm font-semibold">
                        Lire l'article
                    </a>
                </div>
            </article>
        @empty
            <!-- Aucun article -->
            <div class="col-span-full text-center py-20">
                <p class="text-xl text-gray-400">Aucun article disponible pour le moment.</p>
            </div>
        @endforelse
    </div>

    <!-- [OK] Pagination (responsive) -->
    @if ($articles->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $articles->links('pagination::tailwind') }}
        </div>
    @endif
@endsection
