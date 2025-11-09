<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 transition-colors duration-200">
    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
        🎯 Acesso a Array por Índice
    </h3>
    
    <p class="text-gray-700 dark:text-gray-300 mb-6">
        Acessar um elemento de um array pela sua posição é <strong>sempre O(1)</strong>, não importa o tamanho do array!
    </p>

    <!-- Array Visual -->
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Array de Números:
        </label>
        <div class="flex flex-wrap gap-2">
            @foreach($numbers as $i => $num)
                <div class="flex flex-col items-center">
                    <span class="text-xs text-gray-500 dark:text-gray-400 mb-1">{{ $i }}</span>
                    <button wire:click="$set('index', {{ $i }})"
                            class="w-12 h-12 flex items-center justify-center rounded transition-all duration-200
                                   {{ $i == $index ? 'bg-blue-500 text-white ring-2 ring-blue-300 scale-110' : 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-600 cursor-pointer' }}">
                        {{ $num }}
                    </button>
                </div>
            @endforeach
        </div>
        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">💡 Clique em qualquer número para selecioná-lo!</p>
    </div>

    <!-- Controls -->
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Escolha o Índice (0 a {{ count($numbers) - 1 }}):
        </label>
        <div class="flex gap-4 items-center">
            <input type="number" 
                   wire:model.live="index" 
                   min="0" 
                   max="{{ count($numbers) - 1 }}"
                   class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md 
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                          focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <button wire:click="accessByIndex" 
                    wire:loading.attr="disabled"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md 
                           transition-colors duration-200 disabled:opacity-50">
                <span wire:loading.remove>Buscar</span>
                <span wire:loading>Carregando...</span>
            </button>
        </div>
    </div>

    <!-- Result -->
    @if($result !== null)
        <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-md">
            <p class="text-green-800 dark:text-green-300 font-medium">
                ✅ Valor na posição {{ $index }}: <span class="text-2xl">{{ $result }}</span>
            </p>
        </div>
    @endif

    <!-- Steps Visualization -->
    @if(count($steps) > 0)
        <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">📋 Passo a Passo:</h4>
            <div class="space-y-2">
                @foreach($steps as $step)
                    <div class="flex items-start gap-2 text-sm text-gray-600 dark:text-gray-400">
                        <span class="text-blue-500 mt-1">→</span>
                        <span>{{ $step }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    <!-- Solution Dropdown -->
    <details class="group">
        <summary class="cursor-pointer list-none">
            <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-700/50 rounded-md hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors">
                <span class="font-medium text-gray-900 dark:text-white">💡 Ver Explicação Completa</span>
                <svg class="w-5 h-5 text-gray-500 transition-transform group-open:rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                </svg>
            </div>
        </summary>
        <div class="mt-4 p-4 bg-gray-50 dark:bg-gray-700/50 rounded-md space-y-4">
            <div>
                <h5 class="font-semibold text-gray-900 dark:text-white mb-2">🎯 Por que é O(1)?</h5>
                <p class="text-gray-700 dark:text-gray-300 text-sm">
                    Arrays armazenam elementos em posições sequenciais de memória. Para acessar qualquer elemento,
                    o computador calcula: <code class="bg-gray-200 dark:bg-gray-600 px-2 py-1 rounded">endereço_base + (índice × tamanho_elemento)</code>
                </p>
                <p class="text-gray-700 dark:text-gray-300 text-sm mt-2">
                    Essa é uma operação matemática simples que leva o <strong>mesmo tempo</strong>, independente se o array tem 10 ou 10.000 elementos!
                </p>
            </div>
            
            <div>
                <h5 class="font-semibold text-gray-900 dark:text-white mb-2">💻 Código Explicado:</h5>
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-md text-xs overflow-x-auto"><code>// O(1) - Acesso direto por índice
$result = $numbers[$index];

// Internamente, o PHP faz:
// 1. Pega o endereço base do array na memória
// 2. Calcula: endereço_base + (índice × bytes_por_elemento)  
// 3. Retorna o valor naquele endereço
// Total: 3 operações - SEMPRE as mesmas!</code></pre>
            </div>

            <div>
                <h5 class="font-semibold text-gray-900 dark:text-white mb-2">⚡ Comparação:</h5>
                <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1">
                    <li>• Array com 10 elementos → 1 operação</li>
                    <li>• Array com 1.000 elementos → 1 operação</li>
                    <li>• Array com 1.000.000 elementos → 1 operação</li>
                </ul>
                <p class="text-sm text-gray-700 dark:text-gray-300 mt-2 font-medium">
                    O tempo é <strong>constante</strong>, por isso dizemos O(1)!
                </p>
            </div>
        </div>
    </details>
</div>
