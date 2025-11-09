@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
            O(n) - Complexidade Linear
        </h1>
        <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
            A complexidade <strong>mais comum</strong> e intuitiva! Algoritmos O(n) percorrem os dados uma vez, 
            onde o tempo de execução cresce <strong>proporcionalmente</strong> ao tamanho da entrada.
        </p>
    </div>

    <!-- Concept Explanation -->
    <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
            <span>📏</span>
            <span>O que é Complexidade Linear?</span>
        </h2>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p>
                Imagine uma fila: <strong>você precisa olhar cada pessoa para encontrar alguém específico</strong>. 
                Se tem 10 pessoas, olha 10. Se tem 100, olha 100. É uma relação <strong>1 para 1</strong>.
            </p>
            <ul class="space-y-2 ml-6">
                <li>• 10 elementos → <strong>10 operações</strong> (1x)</li>
                <li>• 100 elementos → <strong>100 operações</strong> (10x mais)</li>
                <li>• 1.000 elementos → <strong>1.000 operações</strong> (100x mais)</li>
                <li>• Dobrou o tamanho? <strong>Dobrou o tempo!</strong></li>
            </ul>
            <div class="bg-white dark:bg-gray-800 rounded-md p-4 mt-4">
                <p class="font-semibold text-green-600 dark:text-green-400">
                    💡 O(n) = Uma passada pelos dados. Simples, direto, previsível!
                </p>
            </div>
        </div>
    </div>

    <!-- When to Use -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
            🎯 Quando usar O(n)?
        </h2>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="bg-green-50 dark:bg-green-900/20 rounded-md p-4">
                <h3 class="font-semibold text-green-800 dark:text-green-300 mb-2">✅ Ideal para:</h3>
                <ul class="text-sm text-green-700 dark:text-green-400 space-y-1">
                    <li>• Buscar em dados <strong>desordenados</strong></li>
                    <li>• Somar, contar ou calcular sobre todos elementos</li>
                    <li>• Encontrar máximo/mínimo</li>
                    <li>• Quando precisa ver cada elemento pelo menos uma vez</li>
                    <li>• Transformar/mapear arrays</li>
                </ul>
            </div>
            <div class="bg-yellow-50 dark:bg-yellow-900/20 rounded-md p-4">
                <h3 class="font-semibold text-yellow-800 dark:text-yellow-300 mb-2">⚠️ Atenção:</h3>
                <ul class="text-sm text-yellow-700 dark:text-yellow-400 space-y-1">
                    <li>• Para dados ordenados, considere O(log n)</li>
                    <li>• Evite loops aninhados (vira O(n²))</li>
                    <li>• Com milhões de itens, pode ser lento</li>
                    <li>• Se possível, use HashMaps para busca O(1)</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Real World Examples -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
            🌍 Exemplos do Mundo Real
        </h2>
        <div class="grid md:grid-cols-3 gap-4">
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <div class="text-3xl mb-2">🎬</div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Fila de Cinema</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Procurar um amigo na fila: olha cada pessoa até achar
                </p>
            </div>
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <div class="text-3xl mb-2">🛒</div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Carrinho de Compras</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Somar o preço de todos os itens no carrinho
                </p>
            </div>
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <div class="text-3xl mb-2">📋</div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Lista de Tarefas</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Contar quantas tarefas estão completas
                </p>
            </div>
        </div>
    </div>

    <!-- Interactive Examples -->
    <div class="mb-8 space-y-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
            🎮 Exemplos Interativos
        </h2>
        
        <!-- Example 1: Linear Search -->
        <div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                1️⃣ Busca Linear
            </h3>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
                Procurar um valor em um array desordenado - precisa olhar elemento por elemento.
            </p>
            <livewire:examples.linear-search-example />
        </div>

        <!-- Example 2: Find Max/Min -->
        <div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                2️⃣ Encontrar Maior e Menor
            </h3>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
                Para achar o maior ou menor valor, você precisa comparar com todos os elementos.
            </p>
            <livewire:examples.find-max-min-example />
        </div>

        <!-- Example 3: Sum Elements -->
        <div>
            <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-3">
                3️⃣ Somar Elementos
            </h3>
            <p class="text-gray-700 dark:text-gray-300 mb-4">
                Calcular a soma de todos os números - essencial olhar cada um.
            </p>
            <livewire:examples.sum-elements-example />
        </div>
    </div>

    <!-- Comparison Chart -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
            📊 Comparação de Performance
        </h2>
        <p class="text-gray-700 dark:text-gray-300 mb-4">
            Veja como O(n) se compara com outras complexidades:
        </p>
        <div class="overflow-x-auto">
            <table class="min-w-full">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            Tamanho (n)
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            O(1) Constante
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-blue-700 dark:text-blue-400 uppercase tracking-wider">
                            O(log n) Logarítmica
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-green-700 dark:text-green-400 uppercase tracking-wider">
                            O(n) Linear
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-orange-700 dark:text-orange-400 uppercase tracking-wider">
                            O(n log n)
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-red-700 dark:text-red-400 uppercase tracking-wider">
                            O(n²) Quadrática
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white font-medium">10</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 dark:text-blue-400">~4</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">10</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-orange-600 dark:text-orange-400">~40</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 dark:text-red-400">100</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white font-medium">100</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 dark:text-blue-400">~7</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">100</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-orange-600 dark:text-orange-400">~700</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 dark:text-red-400">10.000</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white font-medium">1.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 dark:text-blue-400">~10</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">1.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-orange-600 dark:text-orange-400">~10.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 dark:text-red-400">1.000.000</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white font-medium">10.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-blue-600 dark:text-blue-400">~14</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">10.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-orange-600 dark:text-orange-400">~140.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 dark:text-red-400">100.000.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4 p-4 bg-green-50 dark:bg-green-900/20 rounded-md">
            <p class="text-sm text-green-800 dark:text-green-300">
                <strong>💡 Percebeu?</strong> O(n) cresce de forma <strong>previsível e proporcional</strong>. 
                É mais lento que O(1) e O(log n), mas muito melhor que O(n²)!
            </p>
        </div>
    </div>

    <!-- Key Takeaways -->
    <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
            🎓 Pontos Principais
        </h2>
        <ul class="space-y-3 text-gray-700 dark:text-gray-300">
            <li class="flex items-start gap-3">
                <span class="text-2xl">📏</span>
                <span>
                    <strong>Crescimento proporcional</strong> - dobrou o tamanho? Dobrou o tempo!
                </span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-2xl">👁️</span>
                <span>
                    <strong>Uma passada pelos dados</strong> - geralmente um único loop sem aninhamento
                </span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-2xl">✅</span>
                <span>
                    <strong>Muito comum e aceitável</strong> - a maioria das operações básicas são O(n)
                </span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-2xl">⚡</span>
                <span>
                    <strong>Geralmente inevitável</strong> - se precisa ver todos elementos, será no mínimo O(n)
                </span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-2xl">🎯</span>
                <span>
                    <strong>Exemplos clássicos:</strong> Busca Linear, Encontrar Max/Min, Somar elementos, Filtrar arrays
                </span>
            </li>
        </ul>
    </div>
</div>
@endsection
