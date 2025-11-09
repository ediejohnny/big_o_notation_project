@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <header class="space-y-2">
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">O(2ⁿ) - Complexidade Exponencial</h1>
        <p class="text-gray-600 dark:text-gray-300">Problemas em que o número de possibilidades dobra a cada novo elemento. Cresce muito rápido — ideal para aprender limites práticos de algoritmos.</p>
    </header>

    <section class="space-y-4">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Desafio 1: Fibonacci Recursivo (ingênuo)</h2>
        <p class="text-gray-600 dark:text-gray-300">Implementação clássica recursiva, sem memoization. Ótima para visualizar chamadas duplicadas.</p>
        @livewire('examples.fibonacci-recursive-example')
        <details class="mt-2">
            <summary class="cursor-pointer text-sm text-gray-700 dark:text-gray-300">Ver solução e explicação</summary>
            <div class="mt-2 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 space-y-3 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>Por que O(2ⁿ)?</strong> Cada chamada gera duas novas chamadas (n-1 e n-2), formando uma árvore binária de chamadas.</p>
                <p><strong>Situações reais:</strong> backtracking sem poda, buscas em espaço de estados, problemas combinatórios.</p>
            </div>
        </details>
    </section>

    <section class="space-y-4">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Desafio 2: Subconjuntos (Power Set)</h2>
        <p class="text-gray-600 dark:text-gray-300">Gerar todos os subconjuntos de um conjunto com n elementos. Há 2ⁿ subconjuntos possíveis.</p>
        @livewire('examples.power-set-example')
        <details class="mt-2">
            <summary class="cursor-pointer text-sm text-gray-700 dark:text-gray-300">Ver solução e explicação</summary>
            <div class="mt-2 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 space-y-3 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>Por que O(2ⁿ)?</strong> Precisamos visitar cada subconjunto possível. O número total dobra a cada novo item.</p>
                <p><strong>Uso prático:</strong> testes de combinação, seleção de features, exploração de possibilidades.</p>
            </div>
        </details>
    </section>

    <section class="space-y-4">
        <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Desafio 3: Torre de Hanói</h2>
        <p class="text-gray-600 dark:text-gray-300">Problema clássico de mover discos entre hastes seguindo regras. Exige 2ⁿ−1 movimentos mínimos.</p>
        @livewire('examples.tower-of-hanoi-example')
        <details class="mt-2">
            <summary class="cursor-pointer text-sm text-gray-700 dark:text-gray-300">Ver solução e explicação</summary>
            <div class="mt-2 p-4 bg-gray-50 dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 space-y-3 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>Por que O(2ⁿ)?</strong> Para n discos, o número de movimentos mínimos é 2ⁿ−1, crescendo exponencialmente.</p>
                <p><strong>Dica:</strong> mantenha n pequeno (3 a 8) para visualizar bem sem travar o navegador.</p>
            </div>
        </details>
    </section>
</div>
@endsection
