@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto">
        <!-- Hero Section -->
        <div class="text-center mb-12">
            <h1 class="text-4xl sm:text-5xl font-bold text-gray-900 dark:text-white mb-4">
                Bem-vindo ao Big O Notation! 📊
            </h1>
            <p class="text-xl text-gray-600 dark:text-gray-300 leading-relaxed">
                Aprenda sobre a complexidade de algoritmos de forma prática e interativa
            </p>
        </div>

        <!-- Introduction Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg p-8 mb-8 border border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
                O que é Big O Notation?
            </h2>
            <p class="text-gray-600 dark:text-gray-300 mb-4 leading-relaxed">
                Big O Notation é uma forma matemática de descrever como o tempo de execução ou espaço usado por um algoritmo 
                cresce conforme o tamanho da entrada aumenta. É como medir a "velocidade" de diferentes formas de resolver um problema!
            </p>
            <p class="text-gray-600 dark:text-gray-300 leading-relaxed">
                Imagine que você precisa encontrar um livro em uma biblioteca. Você poderia verificar cada livro um por um (O(n)), 
                ou se os livros estiverem organizados, você poderia usar busca binária (O(log n)). A diferença no tempo necessário 
                é o que o Big O nos ajuda a entender! 📚
            </p>
        </div>

        <!-- Complexity Overview Grid -->
        <div class="mb-12">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-6">
                Tipos de Complexidade
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- O(1) -->
                <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-3">⚡</span>
                        <h3 class="text-lg font-semibold text-green-900 dark:text-green-300">O(1) - Constante</h3>
                    </div>
                    <p class="text-green-700 dark:text-green-400 text-sm">
                        Instantâneo! Sempre leva o mesmo tempo, não importa o tamanho dos dados.
                    </p>
                </div>

                <!-- O(log n) -->
                <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-3">📈</span>
                        <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-300">O(log n) - Logarítmica</h3>
                    </div>
                    <p class="text-blue-700 dark:text-blue-400 text-sm">
                        Muito eficiente! Divide o problema pela metade a cada passo.
                    </p>
                </div>

                <!-- O(n) -->
                <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-3">📊</span>
                        <h3 class="text-lg font-semibold text-yellow-900 dark:text-yellow-300">O(n) - Linear</h3>
                    </div>
                    <p class="text-yellow-700 dark:text-yellow-400 text-sm">
                        Razoável. O tempo cresce proporcionalmente com os dados.
                    </p>
                </div>

                <!-- O(n log n) -->
                <div class="bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-lg p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-3">📉</span>
                        <h3 class="text-lg font-semibold text-orange-900 dark:text-orange-300">O(n log n) - Linearítmica</h3>
                    </div>
                    <p class="text-orange-700 dark:text-orange-400 text-sm">
                        Bom para ordenação. Algoritmos eficientes de sorting.
                    </p>
                </div>

                <!-- O(n²) -->
                <div class="bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-3">⚠️</span>
                        <h3 class="text-lg font-semibold text-red-900 dark:text-red-300">O(n²) - Quadrática</h3>
                    </div>
                    <p class="text-red-700 dark:text-red-400 text-sm">
                        Cuidado! Fica lento rapidamente com muitos dados.
                    </p>
                </div>

                <!-- O(2ⁿ) -->
                <div class="bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg p-6 hover:shadow-md transition-shadow">
                    <div class="flex items-center mb-2">
                        <span class="text-2xl mr-3">💥</span>
                        <h3 class="text-lg font-semibold text-purple-900 dark:text-purple-300">O(2ⁿ) - Exponencial</h3>
                    </div>
                    <p class="text-purple-700 dark:text-purple-400 text-sm">
                        Muito lento! Dobra o tempo a cada elemento adicional.
                    </p>
                </div>
            </div>
        </div>

        <!-- Call to Action -->
        <div class="bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg shadow-lg p-8 text-center text-white">
            <h2 class="text-2xl font-bold mb-4">Pronto para começar?</h2>
            <p class="text-lg mb-6 opacity-90">
                Escolha uma complexidade no menu lateral e explore exemplos práticos com código interativo!
            </p>
            <div class="flex flex-wrap gap-2 justify-center">
                <span class="px-4 py-2 bg-white/20 rounded-full text-sm font-medium">Exemplos Interativos</span>
                <span class="px-4 py-2 bg-white/20 rounded-full text-sm font-medium">Explicações Detalhadas</span>
                <span class="px-4 py-2 bg-white/20 rounded-full text-sm font-medium">Testes em Tempo Real</span>
            </div>
        </div>
    </div>
@endsection
