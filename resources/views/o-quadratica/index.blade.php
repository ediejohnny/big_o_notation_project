@extends('layouts.app')

@section('title', 'O(n²) - Quadrática')

@section('content')
<div class="space-y-8">
    <!-- Introdução -->
    <div class="bg-gradient-to-r from-yellow-50 to-orange-50 dark:from-yellow-900/20 dark:to-orange-900/20 rounded-lg p-6 border border-yellow-200 dark:border-yellow-800">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">⚠️ O(n²) - Quadrática</h1>
        <div class="space-y-3 text-gray-700 dark:text-gray-300">
            <p class="text-lg">
                🎯 <strong>O que é isso?</strong> Complexidade quadrática acontece quando você tem <strong>loops aninhados</strong> 
                (um loop dentro do outro) percorrendo a mesma quantidade de dados.
            </p>
            <p>
                💡 <strong>Pensa assim:</strong> É como comparar <em>cada pessoa</em> da sala com <em>todas as outras pessoas</em> 
                da sala. Se tem 10 pessoas, você faz 100 comparações. Se tem 100 pessoas, faz 10.000 comparações!
            </p>
            <p class="font-semibold text-orange-700 dark:text-orange-400">
                ⚠️ <strong>ATENÇÃO:</strong> Esta complexidade cresce MUITO rápido! 
                Com apenas 1.000 itens, você já faz 1.000.000 de operações. Por isso, evitamos O(n²) sempre que possível!
            </p>
            <p>
                🤔 <strong>Quando acontece?</strong> Sempre que você vê código com dois `for` um dentro do outro, 
                ou quando compara todos os elementos com todos os outros elementos.
            </p>
        </div>
    </div>

    <!-- Bubble Sort -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">🫧 Bubble Sort (Ordenação por Bolha)</h2>
            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>🎓 Como funciona:</strong></p>
                <ol class="list-decimal list-inside space-y-1 ml-4">
                    <li><strong>Compara vizinhos:</strong> Percorre o array comparando cada par de elementos adjacentes</li>
                    <li><strong>Troca se necessário:</strong> Se o da esquerda for maior que o da direita, troca de lugar</li>
                    <li><strong>Repete tudo:</strong> Faz isso várias vezes até o array ficar ordenado</li>
                </ol>
                <p class="mt-3">
                    <strong>🌟 Por que "Bolha"?</strong> Os elementos maiores vão "flutuando" para o final como bolhas na água!
                    <br><strong>⚠️ Problema:</strong> É MUITO lento para dados grandes. Com 1.000 elementos, faz cerca de 1.000.000 de comparações!
                </p>
                <p class="italic text-gray-600 dark:text-gray-400">
                    💭 Exemplo real: Como organizar uma fila de pessoas por altura, comparando cada par e trocando de posição até ficar certo.
                </p>
            </div>
        </div>
        <div class="p-5">
            <livewire:examples.bubble-sort-example />
        </div>
    </div>

    <!-- Selection Sort -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">🎯 Selection Sort (Ordenação por Seleção)</h2>
            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>🎓 Como funciona:</strong></p>
                <ol class="list-decimal list-inside space-y-1 ml-4">
                    <li><strong>Procura o menor:</strong> Percorre o array inteiro procurando o menor elemento</li>
                    <li><strong>Coloca no início:</strong> Troca esse menor elemento com o primeiro da parte não ordenada</li>
                    <li><strong>Repete:</strong> Vai fazendo isso para cada posição até ordenar tudo</li>
                </ol>
                <p class="mt-3">
                    <strong>🌟 Vantagem sobre Bubble Sort:</strong> Faz menos trocas! Ao invés de trocar várias vezes, escolhe direto o menor e coloca no lugar certo.
                    <br><strong>⚠️ Ainda é O(n²):</strong> Mesmo fazendo menos trocas, ainda precisa percorrer tudo várias vezes para achar o menor.
                </p>
                <p class="italic text-gray-600 dark:text-gray-400">
                    💭 Exemplo real: Como escolher os melhores jogadores — você olha todos, escolhe o melhor, depois olha os que sobraram e escolhe o próximo melhor, e assim vai.
                </p>
            </div>
        </div>
        <div class="p-5">
            <livewire:examples.selection-sort-example />
        </div>
    </div>

    <!-- Two Sum Brute Force -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-red-50 to-orange-50 dark:from-red-900/20 dark:to-orange-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">🔍 Two Sum - Força Bruta</h2>
            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>🎓 O Problema:</strong> Dado um array de números e um alvo, encontre dois números que somados dão o alvo.</p>
                <p><strong>💪 Solução por Força Bruta (O(n²)):</strong></p>
                <ol class="list-decimal list-inside space-y-1 ml-4">
                    <li><strong>Loop externo:</strong> Pega cada número do array</li>
                    <li><strong>Loop interno:</strong> Para cada número, testa com todos os outros</li>
                    <li><strong>Verifica soma:</strong> Se achar dois que somam o alvo, retorna eles</li>
                </ol>
                <p class="mt-3">
                    <strong>⚠️ Por que é ruim?</strong> Se o array tem 1.000 números, você vai fazer aproximadamente 500.000 somas e comparações!
                    <br><strong>💡 Existe jeito melhor?</strong> Sim! Com HashMap dá pra fazer em O(n) — uma única passada! (Veja na página O(n))
                </p>
                <p class="italic text-gray-600 dark:text-gray-400">
                    💭 Exemplo real: Procurar dois produtos que juntos custam exatamente R$100 — a solução burra é pegar cada produto e testar com todos os outros.
                </p>
            </div>
        </div>
        <div class="p-5">
            <livewire:examples.two-sum-brute-force-example />
        </div>
    </div>

    <!-- Comparação e Conclusão -->
    <div class="bg-orange-50 dark:bg-orange-900/20 rounded-lg p-6 border border-orange-200 dark:border-orange-800">
        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">🚨 Por que evitar O(n²)?</h3>
        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <div class="font-bold text-red-600 dark:text-red-400 mb-2">📊 Crescimento Assustador</div>
                <ul class="space-y-1 text-gray-700 dark:text-gray-300">
                    <li>• 10 itens = 100 operações ✅</li>
                    <li>• 100 itens = 10.000 operações ⚠️</li>
                    <li>• 1.000 itens = 1.000.000 operações ❌</li>
                    <li>• 10.000 itens = 100.000.000 operações 💥</li>
                </ul>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <div class="font-bold text-green-600 dark:text-green-400 mb-2">✅ Quando está OK usar O(n²)</div>
                <ul class="space-y-1 text-gray-700 dark:text-gray-300">
                    <li>• Arrays muito pequenos (< 100 itens)</li>
                    <li>• Código educacional/aprendizado</li>
                    <li>• Protótipos rápidos (depois otimiza)</li>
                    <li>• Quando simplicidade > performance</li>
                </ul>
            </div>
        </div>
        <div class="mt-4 p-4 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg border border-yellow-300 dark:border-yellow-700">
            <p class="text-sm font-semibold text-yellow-900 dark:text-yellow-200">
                💡 <strong>Dica de ouro:</strong> Sempre que ver dois loops aninhados (`for` dentro de `for`), pergunte: 
                "Existe uma forma de fazer isso com apenas um loop usando uma estrutura de dados inteligente (HashMap, Set)?"
                <br>Muitas vezes a resposta é SIM! 🚀
            </p>
        </div>
    </div>
</div>
@endsection
