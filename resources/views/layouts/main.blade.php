<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- [OK] SEO: Titre unique pour chaque page -->
    <title>{{ $title ?? 'Iran War - Actualités' }} | War News</title>
    
    <!-- [OK] SEO: Meta description dynamique -->
    <meta name="description" content="{{ $meta_description ?? 'Suivez l\'actualité et l\'analyse du conflit en Iran.' }}">
    <meta name="theme-color" content="#1a1a1a">
    <meta name="robots" content="index, follow">

    <!-- Candlebar icon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='75' font-size='75' fill='%23ff0000'>⚔</text></svg>">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-900 text-gray-100 font-sans">
    <!-- Navigation -->
    <nav x-data="{ open: false }" class="bg-black border-b-2 border-red-600 sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="flex items-center gap-2">
                    <span class="text-2xl font-bold text-red-600">WAR NEWS</span>
                </a>

                <!-- Menu principal (desktop) -->
                <div class="hidden md:flex items-center gap-6">
                    <a href="{{ route('home') }}" 
                       class="text-gray-300 hover:text-red-600 transition font-semibold">
                        Accueil
                    </a>
                    @foreach ($categories ?? [] as $category)
                        <a href="{{ route('articles.category', $category->slug) }}" 
                           class="text-gray-300 hover:text-red-600 transition font-semibold">
                            {{ $category->name }}
                        </a>
                    @endforeach
                    
                    <!-- Bouton Se connecter (desktop) -->
                    @auth
                        <a href="{{ route('dashboard') }}" class="ml-4 px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                            Tableau de bord
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="ml-4 px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 transition">
                            Se connecter
                        </a>
                    @endauth
                </div>

                <!-- Bouton Burger (mobile) -->
                <div class="md:hidden flex items-center">
                    <button @click="open = !open" class="text-gray-400 hover:text-white focus:outline-none">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path x-show="!open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                            <path x-show="open" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>

        <!-- Menu mobile (déroulant) -->
        <div x-show="open" @click.away="open = false" class="md:hidden bg-black border-t border-gray-800">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('home') }}" 
                   class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">
                    Accueil
                </a>
                @foreach ($categories ?? [] as $category)
                    <a href="{{ route('articles.category', $category->slug) }}" 
                       class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">
                        {{ $category->name }}
                    </a>
                @endforeach
            </div>
            <div class="pt-4 pb-3 border-t border-gray-700">
                <div class="px-2 space-y-1">
                    @auth
                        <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">
                            Tableau de bord
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-gray-300 hover:text-white hover:bg-gray-700">
                            Se connecter
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenu principal -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-black border-t border-gray-800 mt-20 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center text-gray-500 text-sm">
            <p>&copy; 2026 War News. Tous droits réservés.</p>
            <p class="mt-2">Une source d'information sur le conflit en Iran</p>
        </div>
    </footer>
</body>
</html>
