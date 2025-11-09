<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Big O Notation - Aprenda Complexidade de Algoritmos' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
    <script>
        // Initialize theme on page load to prevent flash
        if (localStorage.getItem('theme') === 'dark') {
            document.documentElement.classList.add('dark');
        }
        
        if (localStorage.getItem('theme') === 'light') {
            document.documentElement.classList.remove('dark');
        }
    </script>
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-200" x-data="{ mobileMenuOpen: false }">
    <div class="min-h-screen">
        <!-- Header -->
        <header class="bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-700 fixed w-full top-0 z-30 transition-colors duration-200">
            <div class="px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Mobile menu button -->
                    <button @click="mobileMenuOpen = !mobileMenuOpen" 
                            class="lg:hidden p-2 rounded-md text-gray-600 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path x-show="!mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                            <path x-show="mobileMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>

                    <!-- Logo -->
                    <div class="flex items-center">
                        <a href="{{ route('home') }}" class="flex items-center space-x-2">
                            <span class="text-2xl">📊</span>
                            <span class="text-xl font-bold text-gray-900 dark:text-white">Big O Notation</span>
                        </a>
                    </div>

                    <!-- Theme Toggle -->
                    <button @click="toggleTheme()" 
                            class="p-2 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-300 hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors">
                        <svg x-show="!$root.classList.contains('dark')" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                        <svg x-show="$root.classList.contains('dark')" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </button>
                </div>
            </div>
        </header>

        <!-- Sidebar for desktop -->
        <aside class="hidden lg:flex lg:flex-col lg:fixed lg:inset-y-0 lg:w-64 lg:pt-16 bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transition-colors duration-200">
            <nav class="flex-1 px-4 py-6 overflow-y-auto">
                <h2 class="px-3 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
                    Complexidades
                </h2>
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('home') }}" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('home') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }} transition-colors">
                            <span class="mr-3">🏠</span>
                            Início
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('o-constante') }}" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('o-constante') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }} transition-colors">
                            <span class="mr-3">⚡</span>
                            O(1) - Constante
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('o-logaritmico') }}" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('o-logaritmico') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }} transition-colors">
                            <span class="mr-3">📈</span>
                            O(log n) - Logarítmica
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('o-linear') }}" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('o-linear') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }} transition-colors">
                            <span class="mr-3">📊</span>
                            O(n) - Linear
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('o-linearitimica') }}" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('o-linearitimica') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }} transition-colors">
                            <span class="mr-3">📉</span>
                            O(n log n) - Linearítmica
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="mr-3">📦</span>
                            O(n²) - Quadrática
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="mr-3">📦</span>
                            O(n³) - Cúbica
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="mr-3">💥</span>
                            O(2ⁿ) - Exponencial
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="mr-3">🔥</span>
                            O(n!) - Fatorial
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Mobile sidebar -->
        <div x-show="mobileMenuOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="lg:hidden fixed inset-0 z-40 bg-gray-600 bg-opacity-75"
             @click="mobileMenuOpen = false"></div>

        <aside x-show="mobileMenuOpen"
               x-transition:enter="transition ease-out duration-200"
               x-transition:enter-start="-translate-x-full"
               x-transition:enter-end="translate-x-0"
               x-transition:leave="transition ease-in duration-150"
               x-transition:leave-start="translate-x-0"
               x-transition:leave-end="-translate-x-full"
               class="lg:hidden fixed inset-y-0 left-0 z-50 w-64 bg-white dark:bg-gray-800 transform transition-transform duration-200">
            <div class="flex items-center justify-between h-16 px-4 border-b border-gray-200 dark:border-gray-700">
                <span class="text-lg font-bold text-gray-900 dark:text-white">Menu</span>
                <button @click="mobileMenuOpen = false" class="p-2 rounded-md text-gray-600 dark:text-gray-300">
                    <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            <nav class="flex-1 px-4 py-6 overflow-y-auto">
                <h2 class="px-3 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-3">
                    Complexidades
                </h2>
                <ul class="space-y-1">
                    <li>
                        <a href="{{ route('home') }}" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('home') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }} transition-colors">
                            <span class="mr-3">🏠</span>
                            Início
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('o-constante') }}" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('o-constante') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }} transition-colors">
                            <span class="mr-3">⚡</span>
                            O(1) - Constante
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('o-logaritmico') }}" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('o-logaritmico') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }} transition-colors">
                            <span class="mr-3">📈</span>
                            O(log n) - Logarítmica
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('o-linear') }}" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('o-linear') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }} transition-colors">
                            <span class="mr-3">📊</span>
                            O(n) - Linear
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('o-linearitimica') }}" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg {{ request()->routeIs('o-linearitimica') ? 'bg-blue-50 dark:bg-blue-900/50 text-blue-700 dark:text-blue-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700' }} transition-colors">
                            <span class="mr-3">📉</span>
                            O(n log n) - Linearítmica
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="mr-3">⚠️</span>
                            O(n²) - Quadrática
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="mr-3">📦</span>
                            O(n³) - Cúbica
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="mr-3">💥</span>
                            O(2ⁿ) - Exponencial
                        </a>
                    </li>
                    <li>
                        <a href="#" 
                           class="flex items-center px-3 py-2 text-sm font-medium rounded-lg text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                            <span class="mr-3">🔥</span>
                            O(n!) - Fatorial
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="lg:pl-64 pt-16">
            <div class="px-4 sm:px-6 lg:px-8 py-8">
                @yield('content')
            </div>
            
            <!-- Footer -->
            <footer class="border-t border-gray-200 dark:border-gray-700 mt-12 py-6">
                <div class="px-4 sm:px-6 lg:px-8">
                    <p class="text-center text-sm text-gray-500 dark:text-gray-400">
                        Big O Notation Learning Platform v0.4.0 • 
                        <a href="https://github.com/ediejohnny/big_o_notation_project" target="_blank" class="hover:text-blue-600 dark:hover:text-blue-400">
                            GitHub
                        </a>
                    </p>
                </div>
            </footer>
        </main>
    </div>

    @livewireScripts
</body>
</html>
