@extends('layouts.main')

@section('content')
    <article class="max-w-2xl mx-auto">
        <!-- [OK] Breadcrumb (navigation sémantique) -->
        <nav class="text-sm text-gray-500 mb-8">
            <a href="{{ route('home') }}" class="hover:text-red-600">Accueil</a>
            <span class="mx-2">/</span>
            <a href="{{ route('articles.category', $article->category->slug) }}" class="hover:text-red-600">
                {{ $article->category->name }}
            </a>
            <span class="mx-2">/</span>
            <span class="text-gray-300">{{ $article->title }}</span>
        </nav>

        <!-- [OK] Catégorie (H2) -->
        <h2 class="text-sm font-semibold text-red-600 mb-4 uppercase">
            {{ $article->category->name }}
        </h2>

        <!-- [OK] H1 UNIQUE: Titre article contenant le mot-clé (SEO) -->
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4 leading-tight">
            {{ $article->title }}
        </h1>

        <!-- [OK] Meta informations -->
        <div class="flex flex-wrap gap-6 text-sm text-gray-400 mb-8 pb-8 border-b border-gray-700">
            <time datetime="{{ $article->created_at->format('Y-m-d') }}">
               _{{ $article->created_at->format('d M Y') }}
            </time>
            @if ($article->updated_at && $article->updated_at->ne($article->created_at))
                <span>Mis à jour: {{ $article->updated_at->format('d M Y') }}</span>
            @endif
        </div>

        <!-- [OK] Image avec contexte sémantique et alt (SEO + accessibilité) -->
        @if ($article->img_url)
            <figure class="mb-12">
                <img src="{{ $article->img_url }}" 
                     alt="{{ $article->img_alt ?? $article->title }}"
                     class="w-full rounded shadow-lg"
                     loading="lazy">
                @if ($article->img_alt)
                    <figcaption class="text-sm text-gray-500 mt-2 text-center">
                        {{ $article->img_alt }}
                    </figcaption>
                @endif
            </figure>
        @endif

        <!-- [OK] Contenu avec hiérarchie Hn logique -->
        <div class="prose prose-invert max-w-none mb-12">
            <div class="text-gray-300 leading-relaxed whitespace-pre-wrap">
                {{ $article->content }}
            </div>
        </div>

        <!-- [OK] Articles liés (H3 pour maintenir la hiérarchie) -->
        @if ($relatedArticles->count() > 0)
            <section class="mt-20 pt-12 border-t border-gray-700">
                <h3 class="text-2xl font-bold text-white mb-8">
                    Articles liés
                </h3>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($relatedArticles as $related)
                        <a href="{{ route('articles.show', $related->slug) }}" 
                           class="block bg-gray-800 rounded overflow-hidden hover:shadow-lg hover:shadow-red-600/50 transition">
                            @if ($related->img_url)
                                <img src="{{ $related->img_url }}" 
                                     alt="{{ $related->img_alt ?? $related->title }}"
                                     class="w-full h-40 object-cover">
                            @endif
                            <div class="p-4">
                                <h4 class="font-bold text-white line-clamp-2 hover:text-red-600">
                                    {{ $related->title }}
                                </h4>
                                <time class="text-xs text-gray-500 block mt-2">
                                    {{ $related->created_at->format('d M Y') }}
                                </time>
                            </div>
                        </a>
                    @endforeach
                </div>
            </section>
        @endif

        <!-- [OK] Retour à l'accueil -->
        <div class="mt-12 pt-8 border-t border-gray-700">
            <a href="{{ route('home') }}" 
               class="inline-block px-6 py-3 bg-red-600 text-white rounded hover:bg-red-700 transition font-semibold">
                ← Retour aux articles
            </a>
        </div>
    </article>
@endsection
