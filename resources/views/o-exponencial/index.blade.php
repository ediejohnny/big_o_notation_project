@extends('layouts.app')

@section('title', 'O(2^n) - Exponencial')

@section('content')
<div class="space-y-8">
    <!-- Introdução -->
    <div class="bg-gradient-to-r from-red-50 to-orange-50 dark:from-red-900/20 dark:to-orange-900/20 rounded-lg p-6 border border-red-200 dark:border-red-800">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">💥 O(2^n) - Exponencial</h1>
        <div class="space-y-3 text-gray-700 dark:text-gray-300">
            <p class="text-lg">
                🎯 <strong>O que é isso?</strong> Complexidade exponencial significa que <strong>cada novo elemento DOBRA</strong> o trabalho total. 
                É tipo um vírus se espalhando: 1 pessoa infecta 2, essas 2 infectam 4, depois 8, 16, 32... cresce ABSURDAMENTE rápido!
            </p>
            <p>
                💡 <strong>Pensa assim:</strong> Imagina um desafio de WhatsApp que diz "envie para 2 amigos". 
                Se todo mundo fizer isso, em 30 passos já tem mais mensagens do que pessoas no planeta Terra! (2^30 = 1 bilhão)
            </p>
            <p class="font-semibold text-red-700 dark:text-red-400">
                🚨 <strong>MUITO CUIDADO:</strong> Algoritmos O(2^n) só funcionam para valores MUITO pequenos de n. 
                Com n=40 seu computador já pode travar por horas ou dias!
            </p>
            <p>
                🤔 <strong>Quando acontece?</strong> Quando você precisa testar TODAS as combinações possíveis de algo, 
                ou quando cada decisão gera duas novas decisões (esquerda/direita, sim/não, inclui/não inclui).
            </p>
        </div>
    </div>

    <!-- Fibonacci Recursivo -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-yellow-50 to-amber-50 dark:from-yellow-900/20 dark:to-amber-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">🐰 Sequência de Fibonacci (Jeito Burro)</h2>
            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>🎓 O que é Fibonacci?</strong></p>
                <p>É uma sequência de números onde cada número é a soma dos dois anteriores:</p>
                <ul class="list-disc list-inside ml-4 space-y-1">
                    <li>F(0) = 0</li>
                    <li>F(1) = 1</li>
                    <li>F(2) = 0 + 1 = <strong>1</strong></li>
                    <li>F(3) = 1 + 1 = <strong>2</strong></li>
                    <li>F(4) = 1 + 2 = <strong>3</strong></li>
                    <li>F(5) = 2 + 3 = <strong>5</strong></li>
                    <li>F(6) = 3 + 5 = <strong>8</strong></li>
                    <li>E assim vai: 0, 1, 1, 2, 3, 5, 8, 13, 21, 34...</li>
                </ul>
                <p class="mt-3">
                    <strong>🔁 Como funciona o jeito BURRO (recursivo puro)?</strong>
                </p>
                <ol class="list-decimal list-inside space-y-1 ml-4">
                    <li>Para calcular F(5), você precisa de F(4) + F(3)</li>
                    <li>Para calcular F(4), você precisa de F(3) + F(2)</li>
                    <li>Para calcular F(3), você precisa de F(2) + F(1)</li>
                    <li><strong>PROBLEMA:</strong> F(3) é calculado VÁRIAS VEZES! Desperdiça muito trabalho!</li>
                </ol>
                <p class="mt-3">
                    <strong>⚠️ Por que é O(2^n)?</strong> Cada chamada vira DUAS chamadas (F(n-1) e F(n-2)), 
                    criando uma "árvore" que duplica a cada nível. Com n=30 já são mais de 1 bilhão de chamadas!
                </p>
                <p class="italic text-gray-600 dark:text-gray-400">
                    💭 Exemplo real: É tipo perguntar pro seu amigo uma conta, ele pergunta pra 2 amigos dele, 
                    esses perguntam pra 2 cada, e no fim todo mundo tá fazendo a mesma conta milhões de vezes!
                </p>
                <p class="mt-2 text-xs bg-yellow-100 dark:bg-yellow-900/30 p-2 rounded border border-yellow-300 dark:border-yellow-700">
                    💡 <strong>Dica:</strong> Existe um jeito MUITO mais rápido (O(n)) usando "memoization" (guardar resultados) 
                    ou iteração. Mas aqui mostramos o jeito burro de propósito pra você VER o problema!
                </p>
            </div>
        </div>
        <div class="p-5">
            <livewire:examples.fibonacci-recursive-example />
        </div>
    </div>

    <!-- Power Set -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">🎁 Todas as Combinações Possíveis (Power Set)</h2>
            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>🎓 O que é isso?</strong></p>
                <p>
                    Imagina que você tem 3 sabores de pizza: <strong>Calabresa, Mussarela, Frango</strong>. 
                    Quantas combinações diferentes você pode fazer (incluindo pizza sem cobertura e pizza com tudo)?
                </p>
                <p><strong>Todas as possibilidades:</strong></p>
                <ol class="list-decimal list-inside ml-4 space-y-1">
                    <li>[] - Sem nada (pizza vazia)</li>
                    <li>[Calabresa] - Só calabresa</li>
                    <li>[Mussarela] - Só mussarela</li>
                    <li>[Frango] - Só frango</li>
                    <li>[Calabresa, Mussarela] - Calabresa + Mussarela</li>
                    <li>[Calabresa, Frango] - Calabresa + Frango</li>
                    <li>[Mussarela, Frango] - Mussarela + Frango</li>
                    <li>[Calabresa, Mussarela, Frango] - Pizza completa!</li>
                </ol>
                <p class="mt-3">
                    <strong>⚠️ Por que é O(2^n)?</strong> Para cada item você tem 2 escolhas: <strong>inclui ou não inclui</strong>. 
                    Com 3 itens: 2 × 2 × 2 = 8 combinações. Com 10 itens: 2^10 = 1.024 combinações!
                </p>
                <p class="mt-3">
                    <strong>🌟 Onde usar?</strong> 
                </p>
                <ul class="list-disc list-inside ml-4">
                    <li>Escolher quais matérias estudar (cada uma: estuda ou não)</li>
                    <li>Montar um time (cada jogador: entra ou não)</li>
                    <li>Escolher roupas pra viajar (cada peça: leva ou não)</li>
                    <li>Testar configurações de um jogo (cada opção: liga ou desliga)</li>
                </ul>
                <p class="italic text-gray-600 dark:text-gray-400 mt-2">
                    💭 Exemplo real: Se você tem 20 jogos no Steam e quer testar todas as combinações de mods instalados, 
                    terá 1.048.576 possibilidades! Por isso a gente precisa ser esperto e NÃO testar tudo.
                </p>
            </div>
        </div>
        <div class="p-5">
            <livewire:examples.power-set-example />
        </div>
    </div>

    <!-- Torre de Hanói -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-blue-50 to-cyan-50 dark:from-blue-900/20 dark:to-cyan-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">🗼 Torre de Hanói (Quebra-Cabeça Clássico)</h2>
            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>🎓 O que é Torre de Hanói?</strong></p>
                <p>
                    É um quebra-cabeça antigo (criado em 1883!) com 3 torres (pinos verticais) e vários discos de tamanhos diferentes. 
                    Pensa em <strong>argolas de tamanhos diferentes empilhadas</strong>, tipo aqueles brinquedos de bebê com argolas coloridas!
                </p>
                <p><strong>🎯 O Desafio:</strong></p>
                <ol class="list-decimal list-inside ml-4 space-y-1">
                    <li>No começo: todos os discos estão na torre A, do maior (embaixo) ao menor (em cima)</li>
                    <li><strong>Objetivo:</strong> mover TODOS os discos para a torre C</li>
                    <li><strong>Regra 1:</strong> Só pode mover 1 disco por vez</li>
                    <li><strong>Regra 2:</strong> Nunca pode colocar um disco MAIOR em cima de um MENOR</li>
                    <li>Pode usar a torre B como "auxiliar" pra guardar discos temporariamente</li>
                </ol>
                <p class="mt-3"><strong>💡 Como funciona?</strong></p>
                <p>A solução é recursiva (usa a mesma estratégia de forma repetida):</p>
                <ol class="list-decimal list-inside ml-4 space-y-1">
                    <li>Move n-1 discos de A para B (usando C como auxiliar)</li>
                    <li>Move o maior disco de A para C</li>
                    <li>Move n-1 discos de B para C (usando A como auxiliar)</li>
                </ol>
                <p class="mt-3">
                    <strong>⚠️ Por que é O(2^n)?</strong> Para n discos, você precisa fazer <strong>2^n - 1</strong> movimentos. 
                    Não tem jeito mais rápido — é matematicamente provado que esse é o mínimo de passos possível!
                </p>
                <div class="mt-3 p-3 bg-blue-100 dark:bg-blue-900/30 rounded border border-blue-300 dark:border-blue-700">
                    <p class="font-semibold text-blue-900 dark:text-blue-200">📖 Curiosidade histórica:</p>
                    <p class="text-xs mt-1 text-blue-800 dark:text-blue-300">
                        Uma lenda diz que monges têm uma torre com 64 discos de ouro e que o mundo acaba quando terminarem de resolver. 
                        Fazendo 1 movimento por segundo, levaria <strong>585 BILHÕES de anos</strong> (2^64 - 1 = 18 quintilhões de movimentos)! 
                        O universo tem apenas 13,8 bilhões de anos 😅
                    </p>
                </div>
                <p class="italic text-gray-600 dark:text-gray-400 mt-2">
                    💭 Exemplo real: Organizar pastas no computador quando precisa respeitar hierarquia, 
                    ou resolver puzzles de jogos onde você move coisas seguindo regras específicas.
                </p>
            </div>
        </div>
        <div class="p-5">
            <livewire:examples.tower-of-hanoi-example />
        </div>
    </div>

    <!-- Comparação e Conclusão -->
    <div class="bg-red-50 dark:bg-red-900/20 rounded-lg p-6 border border-red-200 dark:border-red-800">
        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">🚨 Por que O(2^n) é tão perigoso?</h3>
        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <div class="font-bold text-red-600 dark:text-red-400 mb-2">📊 Crescimento ABSURDO</div>
                <ul class="space-y-1 text-gray-700 dark:text-gray-300">
                    <li>• n=10 → 1.024 operações ✅</li>
                    <li>• n=20 → 1.048.576 operações ⚠️</li>
                    <li>• n=30 → 1.073.741.824 operações (1 bilhão!) ❌</li>
                    <li>• n=40 → 1.099.511.627.776 (1 trilhão!) 💥</li>
                    <li>• n=50 → Impossível na prática! 🔥</li>
                </ul>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <div class="font-bold text-green-600 dark:text-green-400 mb-2">✅ O que fazer?</div>
                <ul class="space-y-1 text-gray-700 dark:text-gray-300">
                    <li>• <strong>Programação Dinâmica:</strong> Guardar resultados pra não recalcular (Fibonacci vira O(n)!)</li>
                    <li>• <strong>Greedy (Guloso):</strong> Fazer escolhas "boas o suficiente" ao invés de perfeitas</li>
                    <li>• <strong>Heurísticas:</strong> Atalhos inteligentes que "chutam" soluções boas</li>
                    <li>• <strong>Poda:</strong> Descartar caminhos obviamente ruins cedo</li>
                    <li>• <strong>Limite o problema:</strong> Trabalhe só com valores pequenos de n</li>
                </ul>
            </div>
        </div>
        <div class="mt-4 p-4 bg-orange-100 dark:bg-orange-900/30 rounded-lg border border-orange-300 dark:border-orange-700">
            <p class="text-sm font-semibold text-orange-900 dark:text-orange-200">
                💡 <strong>Lição importante:</strong> Algoritmos O(2^n) mostram que <strong>nem tudo é possível de calcular</strong> 
                mesmo com supercomputadores. Por isso programadores precisam ser criativos e encontrar soluções aproximadas, 
                ao invés de sempre buscar a resposta perfeita! 🎯
            </p>
        </div>
    </div>
</div>
@endsection
