@extends('layouts.app')
<<<<<<< HEAD

@section('title', 'O(n log n) - Linearítmica')

@section('content')
<div class="space-y-8">
    <!-- Introdução -->
    <div class="bg-gradient-to-r from-blue-50 to-purple-50 dark:from-blue-900/20 dark:to-purple-900/20 rounded-lg p-6 border border-blue-200 dark:border-blue-800">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">O(n log n) - Linearítmica</h1>
        <div class="space-y-3 text-gray-700 dark:text-gray-300">
            <p class="text-lg">
                🎯 <strong>O que é isso?</strong> Complexidade linearítmica aparece quando <strong>dividimos o problema várias vezes</strong> 
                (log n divisões) e processamos cada parte com trabalho linear (n operações).
            </p>
            <p>
                💡 <strong>Pensa assim:</strong> É como organizar um baralho de cartas — você separa em grupos menores, 
                organiza cada grupo, e depois junta tudo de forma ordenada. Muito mais rápido que comparar carta por carta!
            </p>
            <p>
                ⚡ <strong>Por que é melhor que O(n²)?</strong> Ao invés de comparar <em>tudo com tudo</em>, 
                você divide inteligentemente o trabalho. Com 1000 itens, O(n²) faz ~1.000.000 operações, 
                mas O(n log n) faz apenas ~10.000!
            </p>
        </div>
    </div>

    <!-- Merge Sort -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">🔀 Merge Sort (Ordenação por Mesclagem)</h2>
            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>🎓 Como funciona:</strong></p>
                <ol class="list-decimal list-inside space-y-1 ml-4">
                    <li><strong>Divide:</strong> Corta o array ao meio repetidamente até sobrar pedaços de 1 elemento</li>
                    <li><strong>Conquista:</strong> Um elemento sozinho já está "ordenado" 😉</li>
                    <li><strong>Mescla:</strong> Junta os pedaços de forma ordenada, comparando os menores de cada lado</li>
                </ol>
                <p class="mt-3">
                    <strong>🌟 Vantagens:</strong> Sempre O(n log n), mesmo no pior caso! Ótimo para dados grandes.
                    <br><strong>⚠️ Desvantagem:</strong> Precisa de espaço extra na memória para criar arrays temporários.
                </p>
                <p class="italic text-gray-600 dark:text-gray-400">
                    💭 Exemplo real: Como fazer duas filas ordenadas virarem uma só — sempre pega o menor da frente de cada fila!
                </p>
            </div>
        </div>
        <div class="p-5">
            <livewire:examples.merge-sort-example />
        </div>
    </div>

    <!-- Quick Sort -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-orange-50 to-yellow-50 dark:from-orange-900/20 dark:to-yellow-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">⚡ Quick Sort (Ordenação Rápida)</h2>
            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>🎓 Como funciona:</strong></p>
                <ol class="list-decimal list-inside space-y-1 ml-4">
                    <li><strong>Escolhe um pivô:</strong> Pega um elemento como "referência" (geralmente o último)</li>
                    <li><strong>Particiona:</strong> Coloca todos menores que o pivô à esquerda, maiores à direita</li>
                    <li><strong>Repete:</strong> Faz o mesmo processo recursivamente para cada lado</li>
                </ol>
                <p class="mt-3">
                    <strong>🌟 Vantagens:</strong> Geralmente o mais rápido na prática! Não precisa de memória extra.
                    <br><strong>⚠️ Desvantagem:</strong> No pior caso (array já ordenado) pode virar O(n²).
                </p>
                <p class="italic text-gray-600 dark:text-gray-400">
                    💭 Exemplo real: Como separar alunos por altura — escolhe uma altura de referência e divide: "menores pra esquerda, maiores pra direita!"
                </p>
            </div>
        </div>
        <div class="p-5">
            <livewire:examples.quick-sort-example />
        </div>
    </div>

    <!-- Heap Sort -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">🌳 Heap Sort (Ordenação por Heap)</h2>
            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>🎓 Como funciona:</strong></p>
                <ol class="list-decimal list-inside space-y-1 ml-4">
                    <li><strong>Constrói um heap:</strong> Organiza o array como uma "árvore especial" onde o pai é sempre maior que os filhos</li>
                    <li><strong>Extrai o máximo:</strong> O topo do heap é o maior — troca ele com o último elemento</li>
                    <li><strong>Reorganiza (heapify):</strong> Ajusta o heap para manter a propriedade</li>
                    <li><strong>Repete:</strong> Vai extraindo o maior e reorganizando até ordenar tudo</li>
                </ol>
                <p class="mt-3">
                    <strong>🌟 Vantagens:</strong> Sempre O(n log n) e não usa memória extra! Consistente e previsível.
                    <br><strong>⚠️ Desvantagem:</strong> Na prática é mais lento que Quick Sort, mas mais confiável.
                </p>
                <p class="italic text-gray-600 dark:text-gray-400">
                    💭 Exemplo real: Como uma fila de prioridade — o mais importante sempre sobe pro topo automaticamente!
                </p>
            </div>
        </div>
        <div class="p-5">
            <livewire:examples.heap-sort-example />
        </div>
    </div>

    <!-- Comparação Final -->
    <div class="bg-blue-50 dark:bg-blue-900/20 rounded-lg p-6 border border-blue-200 dark:border-blue-800">
        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">📊 Qual usar?</h3>
        <div class="grid md:grid-cols-3 gap-4 text-sm">
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <div class="font-bold text-green-600 dark:text-green-400 mb-2">✅ Merge Sort</div>
                <p class="text-gray-700 dark:text-gray-300">Use quando precisa de <strong>estabilidade</strong> (manter ordem de itens iguais) e não se importa com memória extra.</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <div class="font-bold text-orange-600 dark:text-orange-400 mb-2">⚡ Quick Sort</div>
                <p class="text-gray-700 dark:text-gray-300">Use quando quer <strong>velocidade máxima</strong> e os dados são aleatórios (não ordenados).</p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <div class="font-bold text-purple-600 dark:text-purple-400 mb-2">🌳 Heap Sort</div>
                <p class="text-gray-700 dark:text-gray-300">Use quando precisa de <strong>performance garantida</strong> O(n log n) e pouca memória.</p>
            </div>
        </div>
    </div>
=======
@section('content')
<div class="space-y-6">
    <h1 class="text-2xl font-bold text-gray-900 dark:text-gray-100">O(n log n) - Linearítmica</h1>
    <p class="text-gray-600 dark:text-gray-300">Conteúdo original desta seção não carregado nesta branch. Recuperação pendente. Exemplos típicos: Merge Sort, Quick Sort, Heap Sort.</p>
>>>>>>> origin/feature/o-exponencial-examples
</div>
@endsection
