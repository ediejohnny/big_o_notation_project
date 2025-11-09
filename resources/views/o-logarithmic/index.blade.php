@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
            O(log n) - Complexidade Logarítmica
        </h1>
        <p class="text-lg text-gray-700 dark:text-gray-300 leading-relaxed">
            Uma das complexidades <strong>mais eficientes</strong>! Algoritmos O(log n) "cortam o problema pela metade" 
            a cada passo, tornando-os extremamente rápidos mesmo com milhões de dados.
        </p>
    </div>

    <!-- Concept Explanation -->
    <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4 flex items-center gap-2">
            <span>📐</span>
            <span>O que é Logaritmo?</span>
        </h2>
        <div class="space-y-4 text-gray-700 dark:text-gray-300">
            <p>
                Pense assim: <strong>quantas vezes você precisa dividir um número por 2 até chegar em 1?</strong>
            </p>
            <ul class="space-y-2 ml-6">
                <li>• 8 → 4 → 2 → 1 = <strong>3 divisões</strong> (log₂ 8 = 3)</li>
                <li>• 16 → 8 → 4 → 2 → 1 = <strong>4 divisões</strong> (log₂ 16 = 4)</li>
                <li>• 1000 → ... → 1 = <strong>~10 divisões</strong> (log₂ 1000 ≈ 10)</li>
                <li>• 1.000.000 → ... → 1 = <strong>~20 divisões</strong> (log₂ 1.000.000 ≈ 20)</li>
            </ul>
            <div class="bg-white dark:bg-gray-800 rounded-md p-4 mt-4">
                <p class="font-semibold text-blue-600 dark:text-blue-400">
                    💡 Por isso O(log n) é tão rápido: mesmo com 1 milhão de elementos, precisa de apenas ~20 operações!
                </p>
            </div>
        </div>
    </div>

    <!-- When to Use -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
            🎯 Quando usar O(log n)?
        </h2>
        <div class="grid md:grid-cols-2 gap-4">
            <div class="bg-green-50 dark:bg-green-900/20 rounded-md p-4">
                <h3 class="font-semibold text-green-800 dark:text-green-300 mb-2">✅ Ótimo para:</h3>
                <ul class="text-sm text-green-700 dark:text-green-400 space-y-1">
                    <li>• Buscar em dados <strong>ordenados</strong></li>
                    <li>• Árvores binárias balanceadas</li>
                    <li>• Dividir e conquistar problemas</li>
                    <li>• Grandes volumes de dados</li>
                </ul>
            </div>
            <div class="bg-red-50 dark:bg-red-900/20 rounded-md p-4">
                <h3 class="font-semibold text-red-800 dark:text-red-300 mb-2">❌ NÃO funciona com:</h3>
                <ul class="text-sm text-red-700 dark:text-red-400 space-y-1">
                    <li>• Dados <strong>desordenados</strong></li>
                    <li>• Quando precisa ver todos elementos</li>
                    <li>• Arrays muito pequenos (overhead não compensa)</li>
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
                <div class="text-3xl mb-2">📖</div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Dicionário</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Procurar uma palavra abrindo sempre no meio do intervalo de páginas
                </p>
            </div>
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <div class="text-3xl mb-2">🎮</div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Jogo de Adivinhação</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    "Pensei em um número de 1 a 100" - sempre chute o meio do intervalo!
                </p>
            </div>
            <div class="border border-gray-200 dark:border-gray-700 rounded-lg p-4">
                <div class="text-3xl mb-2">🗂️</div>
                <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Banco de Dados</h3>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Índices usam estruturas tipo árvore (B-tree) com busca O(log n)
                </p>
            </div>
        </div>
    </div>

    <!-- Interactive Example -->
    <div class="mb-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
            🎮 Exemplo Interativo: Busca Binária
        </h2>
        <livewire:examples.binary-search-example />
    </div>

    <!-- Comparison Chart -->
    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 mb-8">
        <h2 class="text-2xl font-semibold text-gray-900 dark:text-white mb-4">
            📊 Comparação de Performance
        </h2>
        <p class="text-gray-700 dark:text-gray-300 mb-4">
            Veja como O(log n) é <strong>muito mais eficiente</strong> que O(n) conforme os dados crescem:
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
                        <th class="px-6 py-3 text-left text-xs font-medium text-green-700 dark:text-green-400 uppercase tracking-wider">
                            O(log n) Logarítmica
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 dark:text-gray-300 uppercase tracking-wider">
                            O(n) Linear
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
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">~4</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">10</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 dark:text-red-400">100</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white font-medium">100</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">~7</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">100</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 dark:text-red-400">10.000</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white font-medium">1.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">~10</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">1.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 dark:text-red-400">1.000.000</td>
                    </tr>
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-white font-medium">1.000.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">1</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-green-600 dark:text-green-400 font-semibold">~20</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600 dark:text-gray-400">1.000.000</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-red-600 dark:text-red-400">1.000.000.000.000</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="mt-4 p-4 bg-blue-50 dark:bg-blue-900/20 rounded-md">
            <p class="text-sm text-blue-800 dark:text-blue-300">
                <strong>💡 Percebeu?</strong> Enquanto O(n) cresce proporcionalmente e O(n²) explode, 
                O(log n) cresce <strong>muito devagar</strong>! Por isso é uma das melhores complexidades possíveis!
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
                <span class="text-2xl">🚀</span>
                <span>
                    <strong>O(log n) é extremamente eficiente</strong> - cresce muito devagar mesmo com grandes datasets
                </span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-2xl">✂️</span>
                <span>
                    <strong>"Dividir para conquistar"</strong> - corta o problema pela metade a cada passo
                </span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-2xl">⚠️</span>
                <span>
                    <strong>Requer dados ordenados</strong> - a maioria dos algoritmos O(log n) só funciona com ordem
                </span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-2xl">📈</span>
                <span>
                    <strong>Escala muito bem</strong> - ideal para grandes volumes de dados (milhões de registros)
                </span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-2xl">🎯</span>
                <span>
                    <strong>Exemplos clássicos:</strong> Busca Binária, Árvores Binárias de Busca, algoritmos de divisão e conquista
                </span>
            </li>
        </ul>
    </div>
</div>
@endsection
