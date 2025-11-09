@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
            O(1) - Complexidade Constante
        </h1>
        <p class="text-lg text-gray-700 dark:text-gray-300">
            Operações que levam <strong>sempre o mesmo tempo</strong>, não importa o tamanho dos dados!
        </p>
    </div>

    <!-- Explanation Card -->
    <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6 mb-8">
        <h2 class="text-2xl font-semibold text-blue-900 dark:text-blue-300 mb-3">
            📚 O que é O(1)?
        </h2>
        <p class="text-blue-800 dark:text-blue-200 mb-4">
            Um algoritmo tem complexidade <strong>O(1)</strong> quando executa em tempo constante, ou seja, 
            o número de operações <strong>não aumenta</strong> conforme o tamanho da entrada cresce.
        </p>
        <div class="bg-white dark:bg-gray-800 rounded-md p-4">
            <h3 class="font-semibold text-gray-900 dark:text-white mb-2">Exemplos do Dia a Dia:</h3>
            <ul class="space-y-2 text-gray-700 dark:text-gray-300">
                <li class="flex items-start gap-2">
                    <span class="text-blue-500 mt-1">✓</span>
                    <span>Pegar um livro específico de uma estante sabendo exatamente sua posição</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-blue-500 mt-1">✓</span>
                    <span>Ligar a luz - sempre leva o mesmo tempo, não importa o tamanho da sala</span>
                </li>
                <li class="flex items-start gap-2">
                    <span class="text-blue-500 mt-1">✓</span>
                    <span>Ver quem está ligando no celular - instantâneo, independente de quantos contatos você tem</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- Interactive Examples -->
    <div class="space-y-8">
        <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
            🎮 Exemplos Interativos
        </h2>

        <!-- Example 1: Array Access -->
        <div>
            <livewire:examples.array-access-example />
        </div>

        <!-- Coming Soon - More Examples -->
        <div class="grid md:grid-cols-2 gap-6">
            <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-6 border-2 border-dashed border-gray-300 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    🔜 HashMap Insert
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Inserção em tabela hash - sempre O(1)
                </p>
            </div>
            
            <div class="bg-gray-100 dark:bg-gray-800 rounded-lg p-6 border-2 border-dashed border-gray-300 dark:border-gray-600">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">
                    🔜 Verificar Par/Ímpar
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm">
                    Operação matemática simples - O(1)
                </p>
            </div>
        </div>
    </div>

    <!-- Key Takeaways -->
    <div class="mt-8 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-6">
        <h2 class="text-2xl font-semibold text-green-900 dark:text-green-300 mb-4">
            ✨ Pontos-Chave
        </h2>
        <ul class="space-y-3 text-green-800 dark:text-green-200">
            <li class="flex items-start gap-3">
                <span class="text-2xl">🎯</span>
                <span><strong>Tempo constante:</strong> Sempre executa no mesmo tempo, independente do tamanho da entrada</span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-2xl">⚡</span>
                <span><strong>Mais rápido possível:</strong> O(1) é a melhor complexidade que existe!</span>
            </li>
            <li class="flex items-start gap-3">
                <span class="text-2xl">📊</span>
                <span><strong>Exemplos comuns:</strong> Acesso a array por índice, inserção em hash table, operações matemáticas simples</span>
            </li>
        </ul>
    </div>
</div>
@endsection
