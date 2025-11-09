@extends('layouts.app')

@section('title','O(n³) - Cúbica')
@section('content')
<div class="space-y-8">
    <!-- Intro -->
    <div class="bg-gradient-to-r from-indigo-50 to-blue-50 dark:from-indigo-900/20 dark:to-blue-900/20 p-6 rounded-lg border border-indigo-200 dark:border-indigo-800">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">🧊 O(n³) - Cúbica</h1>
        <div class="space-y-3 text-gray-700 dark:text-gray-300">
            <p class="text-lg">🎯 <strong>O que é?</strong> Complexidade cúbica aparece quando existem <strong>três níveis de loops aninhados</strong> trabalhando sobre o mesmo conjunto de dados (n * n * n operações).</p>
            <p>💡 <strong>Imagine</strong> um cubo 10 x 10 x 10. Para observar cada pequena célula interna você faz 10 * 10 * 10 = 1000 passos. Se for 100 x 100 x 100 vira <strong>1.000.000</strong>.</p>
            <p class="font-semibold text-indigo-700 dark:text-indigo-300">⚠️ Cresce muito rápido: aumentar n impacta em n³ operações. Se n dobrar, o trabalho fica 8x maior.</p>
            <p>🛠️ <strong>Onde surge na prática?</strong> Multiplicação de matrizes ingênuas, busca de triplas (ThreeSum brute force), simulações físicas 3D, contagem de triângulos em grafos, etc...</p>
        </div>
    </div>

    <!-- ThreeSum Section -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-pink-50 to-rose-50 dark:from-pink-900/20 dark:to-rose-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">🔺 Three Sum (Força Bruta)</h2>
            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">Problema: encontrar <strong>triplas de números</strong> em um array que somem a um alvo. Força bruta testa todas as combinações (n³).</p>
            <p class="text-xs italic text-gray-600 dark:text-gray-400">Exemplo real: procurar três produtos que juntos dão exatamente o orçamento.</p>
        </div>
        <div class="p-5">
            <livewire:examples.three-sum-brute-force-example />
        </div>
    </div>

    <!-- Matrix Multiplication Section -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-teal-50 to-green-50 dark:from-teal-900/20 dark:to-green-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">🧮 Multiplicação de Matrizes (Ingênua)</h2>
            <p class="text-sm text-gray-700 dark:text-gray-300 mb-2">Multiplicar duas matrizes quadradas n x n pelo método básico envolve três loops: linha, coluna e soma dos produtos — O(n³).</p>
            <p class="text-xs italic text-gray-600 dark:text-gray-400">Exemplo real: transformações gráficas 3D (rotação/escala) aplicadas repetidamente em jogos.</p>
        </div>
        <div class="p-5">
            <livewire:examples.matrix-multiplication-example />
        </div>
    </div>

    <!-- Comparison -->
    <div class="bg-blue-50 dark:bg-blue-900/30 rounded-lg p-6 border border-blue-200 dark:border-blue-800">
        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">📊 Comparando crescimento</h3>
        <ul class="space-y-1 text-sm text-gray-700 dark:text-gray-300">
            <li>• n = 10 → n³ = 1.000</li>
            <li>• n = 100 → n³ = 1.000.000</li>
            <li>• n = 200 → n³ = 8.000.000</li>
        </ul>
        <p class="mt-3 text-sm text-gray-700 dark:text-gray-300">🚀 Otimizações possíveis: usar estruturas (hash para ThreeSum → O(n²) / O(n)), algoritmos avançados para matrizes (Strassen ~ O(n^{2.81}), Winograd). Mas aqui focamos na versão básica para entender o custo de loops triplos.</p>
        <div class="mt-4 p-4 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg border border-indigo-300 dark:border-indigo-700 text-sm text-indigo-900 dark:text-indigo-200">
            💡 Dica: Sempre que vir <code>for</code> dentro de <code>for</code> dentro de <code>for</code>, pare e questione: "Posso reduzir isto com pré-processamento ou matemática?".
        </div>
    </div>
</div>
@endsection
