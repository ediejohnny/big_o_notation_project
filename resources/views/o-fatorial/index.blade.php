@extends('layouts.app')

@section('title', 'O(n!) - Fatorial')

@section('content')
<div class="space-y-8">
    <!-- Introdução -->
    <div class="bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-lg p-6 border border-purple-200 dark:border-purple-800">
        <h1 class="text-3xl font-bold text-gray-900 dark:text-gray-100 mb-4">🔥 O(n!) - Fatorial (A PIOR DE TODAS!)</h1>
        <div class="space-y-3 text-gray-700 dark:text-gray-300">
            <p class="text-lg">
                🎯 <strong>O que é isso?</strong> Complexidade fatorial é a <strong>PIOR complexidade possível</strong>! 
                O número de operações cresce ABSURDAMENTE rápido — muito mais que exponencial!
            </p>
            <p>
                💡 <strong>O que é fatorial (n!)?</strong> É multiplicar todos os números de 1 até n:
            </p>
            <ul class="list-disc list-inside ml-4 space-y-1 font-mono text-sm">
                <li>3! = 1 × 2 × 3 = <strong>6</strong></li>
                <li>4! = 1 × 2 × 3 × 4 = <strong>24</strong></li>
                <li>5! = 1 × 2 × 3 × 4 × 5 = <strong>120</strong></li>
                <li>10! = 1 × 2 × 3 × 4 × 5 × 6 × 7 × 8 × 9 × 10 = <strong>3.628.800</strong> (mais de 3 milhões!)</li>
                <li>20! = <strong>2.432.902.008.176.640.000</strong> (2,4 quintilhões!)</li>
            </ul>
            <p class="mt-3">
                <strong>🤔 Pensa assim:</strong> Imagina que você tem 10 amigos e quer saber de quantas formas diferentes pode organizar eles em fila. 
                A resposta é 10! = 3.628.800 formas diferentes! Com apenas 20 pessoas já são quintilhões de possibilidades!
            </p>
            <p class="font-semibold text-purple-700 dark:text-purple-400">
                🚨 <strong>EXTREMAMENTE PERIGOSO:</strong> Algoritmos O(n!) só funcionam para valores MINÚSCULOS de n. 
                Com n=15 já demora minutos. Com n=20 pode demorar ANOS!
            </p>
            <p>
                🤯 <strong>Comparação com O(2^n):</strong>
                <br>• 10! = 3.628.800 VS 2^10 = 1.024
                <br>• 20! = 2.432.902.008.176.640.000 VS 2^20 = 1.048.576
                <br><strong>Fatorial é MUITO PIOR que exponencial!</strong>
            </p>
            <p>
                🎯 <strong>Quando acontece?</strong> Quando você precisa testar TODAS as ordens possíveis de n elementos. 
                Exemplos: organizar pessoas em fila, encontrar melhor rota visitando todas as cidades, organizar tarefas em sequência.
            </p>
        </div>
    </div>

    <!-- Permutações -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-purple-50 to-violet-50 dark:from-purple-900/20 dark:to-violet-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">🔄 Permutações (Todas as Ordens Possíveis)</h2>
            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>🎓 O que são permutações?</strong></p>
                <p>
                    São todas as formas diferentes de <strong>organizar coisas em ordem</strong>. 
                    Imagine que você tem 3 letras: A, B, C. Quantas palavras diferentes pode fazer usando todas elas?
                </p>
                <p><strong>Todas as permutações de [A, B, C]:</strong></p>
                <ol class="list-decimal list-inside ml-4 space-y-1 font-mono">
                    <li>[A, B, C] - A primeiro, depois B, depois C</li>
                    <li>[A, C, B] - A primeiro, depois C, depois B</li>
                    <li>[B, A, C] - B primeiro, depois A, depois C</li>
                    <li>[B, C, A] - B primeiro, depois C, depois A</li>
                    <li>[C, A, B] - C primeiro, depois A, depois B</li>
                    <li>[C, B, A] - C primeiro, depois B, depois A</li>
                </ol>
                <p class="mt-3">
                    <strong>Total:</strong> 3! = 3 × 2 × 1 = <strong>6 permutações</strong>
                </p>
                <p class="mt-3">
                    <strong>⚠️ Por que é O(n!)?</strong>
                </p>
                <ul class="list-disc list-inside ml-4">
                    <li>Para a 1ª posição, você tem <strong>n</strong> escolhas</li>
                    <li>Para a 2ª posição, você tem <strong>n-1</strong> escolhas (uma já foi usada)</li>
                    <li>Para a 3ª posição, você tem <strong>n-2</strong> escolhas</li>
                    <li>E assim vai: n × (n-1) × (n-2) × ... × 2 × 1 = <strong>n!</strong></li>
                </ul>
                <p class="mt-3">
                    <strong>🌟 Exemplos práticos:</strong>
                </p>
                <ul class="list-disc list-inside ml-4">
                    <li><strong>Organizar playlist:</strong> De quantas formas você pode ordenar 10 músicas? 10! = 3,6 milhões!</li>
                    <li><strong>Fila de atendimento:</strong> Com 5 pessoas, quantas filas diferentes existem? 5! = 120</li>
                    <li><strong>Senha com letras únicas:</strong> Senha de 4 letras diferentes (sem repetir)? 26 × 25 × 24 × 23 = 358.800</li>
                    <li><strong>Ordem de apresentação:</strong> 8 alunos apresentando trabalho? 8! = 40.320 ordens possíveis!</li>
                </ul>
                <p class="italic text-gray-600 dark:text-gray-400 mt-2">
                    💭 Dica: Por isso aplicativos de música com "aleatório" conseguem tocar suas músicas em ordem diferente quase infinitamente!
                </p>
            </div>
        </div>
        <div class="p-5">
            <livewire:examples.permutations-example />
        </div>
    </div>

    <!-- Problema do Caixeiro Viajante -->
    <div class="rounded-lg border border-gray-200 dark:border-gray-700 bg-white dark:bg-gray-800 overflow-hidden">
        <div class="bg-gradient-to-r from-green-50 to-emerald-50 dark:from-green-900/20 dark:to-emerald-900/20 p-5 border-b border-gray-200 dark:border-gray-700">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-gray-100 mb-3">🗺️ Problema do Caixeiro Viajante (TSP)</h2>
            <div class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                <p><strong>🎓 O que é isso?</strong></p>
                <p>
                    Imagine um entregador que precisa <strong>visitar várias cidades e voltar pra casa</strong>, 
                    percorrendo a <strong>menor distância total possível</strong>. Qual é a melhor rota?
                </p>
                <p><strong>🎯 O Desafio:</strong></p>
                <ul class="list-disc list-inside ml-4 space-y-1">
                    <li>Você tem n cidades para visitar</li>
                    <li>Precisa visitar CADA cidade exatamente 1 vez</li>
                    <li>Precisa voltar pra cidade inicial no final</li>
                    <li>Quer descobrir qual ordem minimiza a distância total percorrida</li>
                </ul>
                <p class="mt-3">
                    <strong>💡 Exemplo do dia a dia:</strong>
                </p>
                <p class="ml-4">
                    Você mora em casa e precisa ir em 5 lugares: Escola, Mercado, Farmácia, Casa do Amigo, Academia. 
                    Depois volta pra casa. Qual ordem você vai neles pra andar o mínimo possível?
                </p>
                <ul class="list-disc list-inside ml-8 text-xs">
                    <li>Opção 1: Casa → Escola → Mercado → Farmácia → Amigo → Academia → Casa</li>
                    <li>Opção 2: Casa → Mercado → Farmácia → Academia → Escola → Amigo → Casa</li>
                    <li>E existem 5! = 120 ordens possíveis! Qual é a melhor?</li>
                </ul>
                <p class="mt-3">
                    <strong>⚠️ Por que é O(n!)?</strong>
                </p>
                <p class="ml-4">
                    Para ter CERTEZA de qual é a melhor rota, você precisa testar TODAS as n! ordens possíveis e comparar as distâncias. 
                    Com 10 cidades já são mais de 3,6 milhões de rotas pra testar!
                </p>
                <p class="mt-3">
                    <strong>🚀 Onde é usado na vida real?</strong>
                </p>
                <ul class="list-disc list-inside ml-4">
                    <li><strong>Aplicativos de entrega:</strong> iFood, Uber Eats (otimizam rotas de entregadores)</li>
                    <li><strong>Logística:</strong> Caminhões de correios, rotas de ônibus</li>
                    <li><strong>Manufatura:</strong> Braços robóticos soldando pontos em peças</li>
                    <li><strong>Perfuração de placas:</strong> Máquinas CNC fazendo furos (minimizar movimento)</li>
                    <li><strong>Turismo:</strong> Roteiros que visitam vários pontos turísticos</li>
                </ul>
                <div class="mt-3 p-3 bg-yellow-100 dark:bg-yellow-900/30 rounded border border-yellow-300 dark:border-yellow-700">
                    <p class="text-xs font-semibold text-yellow-900 dark:text-yellow-200">
                        💡 <strong>Curiosidade:</strong> Este é um dos problemas mais famosos da computação! Não existe solução rápida conhecida. 
                        Por isso empresas usam <strong>heurísticas</strong> (atalhos inteligentes) que encontram soluções "boas o suficiente" ao invés de perfeitas. 
                        É impossível testar todas as rotas quando n > 20!
                    </p>
                </div>
                <p class="italic text-gray-600 dark:text-gray-400 mt-2">
                    💭 Dica: Quando você usa Google Maps pra adicionar várias paradas, ele usa algoritmos avançados pra sugerir uma boa ordem!
                </p>
            </div>
        </div>
        <div class="p-5">
            <livewire:examples.traveling-salesman-example />
        </div>
    </div>

    <!-- Comparação e Conclusão -->
    <div class="bg-purple-50 dark:bg-purple-900/20 rounded-lg p-6 border border-purple-200 dark:border-purple-800">
        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100 mb-3">🔥 O(n!) é literalmente impossível!</h3>
        <div class="grid md:grid-cols-2 gap-4 text-sm">
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <div class="font-bold text-red-600 dark:text-red-400 mb-2">📊 Crescimento INSANO</div>
                <ul class="space-y-1 text-gray-700 dark:text-gray-300 font-mono text-xs">
                    <li>• 5! = 120 ✅</li>
                    <li>• 10! = 3.628.800 ⚠️</li>
                    <li>• 15! = 1.307.674.368.000 (1,3 trilhão!) ❌</li>
                    <li>• 20! = 2,4 quintilhões 💥</li>
                    <li>• 25! = 15 septilhões 🔥</li>
                    <li>• 30! = Mais que átomos no universo! 🌌</li>
                </ul>
                <p class="mt-2 text-xs text-red-600 dark:text-red-400">
                    Com n=15, fazendo 1 bilhão de ops/segundo, levaria <strong>21 minutos</strong>!
                </p>
            </div>
            <div class="bg-white dark:bg-gray-800 p-4 rounded-lg">
                <div class="font-bold text-green-600 dark:text-green-400 mb-2">✅ O que fazer então?</div>
                <ul class="space-y-1 text-gray-700 dark:text-gray-300 text-xs">
                    <li>• <strong>Algoritmos Aproximados:</strong> Encontrar solução "boa o suficiente" (90-95% ótima)</li>
                    <li>• <strong>Heurísticas:</strong> Regras práticas que funcionam bem (ex: sempre ir pra cidade mais próxima)</li>
                    <li>• <strong>Algoritmos Genéticos:</strong> "Evoluir" soluções como na natureza</li>
                    <li>• <strong>Simulated Annealing:</strong> Inspirado em metalurgia (esfriamento de metais)</li>
                    <li>• <strong>Branch and Bound:</strong> Descartar caminhos ruins cedo</li>
                    <li>• <strong>Programação Dinâmica:</strong> Resolver subproblemas (quando possível)</li>
                    <li>• <strong>Limitar o problema:</strong> Trabalhar só com n pequeno (< 15)</li>
                </ul>
            </div>
        </div>
        <div class="mt-4 p-4 bg-orange-100 dark:bg-orange-900/30 rounded-lg border border-orange-300 dark:border-orange-700">
            <p class="text-sm font-semibold text-orange-900 dark:text-orange-200">
                💡 <strong>A grande lição:</strong> Complexidade O(n!) mostra que existem <strong>limites matemáticos</strong> do que computadores podem fazer. 
                Não importa quão rápido seja o processador ou quanta memória você tenha — alguns problemas são <strong>computacionalmente intratáveis</strong> 
                para valores grandes de n. Por isso programadores precisam ser criativos e aceitar soluções aproximadas! 
                <strong>Perfeição nem sempre é possível, mas "bom o suficiente" geralmente é!</strong> 🎯
            </p>
        </div>
    </div>
</div>
@endsection
