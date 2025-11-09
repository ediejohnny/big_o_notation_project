@extends('layouts.app')

@section('title', 'O(n log n) - Linearítmica')

@section('content')
<div class="space-y-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">O(n log n) - Linearítmica</h1>
        <p class="mt-2 text-gray-600 dark:text-gray-300">
            Complexidade linearítmica aparece quando dividimos o problema várias vezes (log n partes) e
            processamos cada parte com trabalho linear. Exemplos clássicos: Merge Sort, Quick Sort e Heap Sort.
        </p>
        <p class="mt-2 text-gray-600 dark:text-gray-300">
            Nesta página você pode editar os dados de entrada, executar os algoritmos e visualizar passos e métricas
            (comparações, movimentações e tempo). Use os exemplos abaixo para experimentar e comparar.
        </p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <div class="rounded-lg border border-gray-200 dark:border-gray-700 p-4 bg-white dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Merge Sort</h2>
            <livewire:examples.merge-sort-example />
        </div>

        <div class="rounded-lg border border-gray-200 dark:border-gray-700 p-4 bg-white dark:bg-gray-800">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Quick Sort</h2>
            <livewire:examples.quick-sort-example />
        </div>

        <div class="rounded-lg border border-gray-200 dark:border-gray-700 p-4 bg-white dark:bg-gray-800 lg:col-span-2">
            <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Heap Sort</h2>
            <livewire:examples.heap-sort-example />
        </div>
    </div>
</div>
@endsection
