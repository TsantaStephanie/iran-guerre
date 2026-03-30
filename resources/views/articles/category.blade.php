@extends('layouts.main')

@section('content')
    <!-- [OK] H1 unique: Titre catégorie (SEO) -->
    <h1 class="text-4xl md:text-5xl font-bold mb-2 text-white">
        {{ $category->name }}
    </h1>

    <!-- [OK] Hiérarchie Hn: Sous-titre H2 -->
    <h2 class="text-xl text-gray-400 mb-12">
        {{ $articles->total() }} article{{ $articles->total() > 1 ? 's' : '' }} dans cette catégorie
    </h2>

    <!-- Articles par catégorie -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @forelse ($articles as $article)
            <article class="bg-gray-800 rounded overflow-hidden hover:shadow-lg hover:shadow-red-600/50 transition">
                <!-- [OK] Image avec alt -->
                @if ($article->img_url)
                    <img src="{{ $article->img_url }}" 
                         alt="{{ $article->img_alt ?? $article->title }}"
                         class="w-full h-48 object-cover">
                @else
                    <div class="w-full h-48 bg-gray-700 flex items-center justify-center">
                        <span class="text-gray-500">Pas d'image</span>
                    </div>
                @endif

                <div class="p-6">
                    <h3 class="text-xl font-bold text-white mb-3 line-clamp-2">
                        <a href="{{ route('articles.show', $article->slug) }}" 
                           class="hover:text-red-600 transition">
                            {{ $article->title }}
                        </a>
                    </h3>

                    <p class="text-gray-400 text-sm mb-4 line-clamp-2">
                        {{ $article->meta_description ?? Str::limit(strip_tags($article->content), 100) }}
                    </p>

                    <time class="text-xs text-gray-500">
                        {{ $article->created_at->format('d M Y') }}
                    </time>

                    <a href="{{ route('articles.show', $article->slug) }}" 
                       class="inline-block mt-4 px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition text-sm">
                        Lire l'article
                    </a>
                </div>
            </article>
        @empty
            <div class="col-span-full text-center py-20">
                <p class="text-xl text-gray-400">Aucun article dans cette catégorie.</p>
            </div>
        @endforelse
    </div>

    <!-- Pagination -->
    @if ($articles->hasPages())
        <div class="mt-12 flex justify-center">
            {{ $articles->links('pagination::tailwind') }}
        </div>
    @endif
@endsection
