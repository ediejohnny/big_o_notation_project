<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6">
    <!-- Array Visualization -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-3">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Array Atual:</h3>
            <div class="flex flex-wrap gap-2">
                <button wire:click="addNumber" 
                        class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white text-sm rounded transition-colors">
                    + Adicionar Número
                </button>
                <button wire:click="resetArray" 
                        class="px-3 py-1 bg-gray-500 hover:bg-gray-600 text-white text-sm rounded transition-colors">
                    🔄 Resetar
                </button>
            </div>
        </div>
        
        <div class="flex flex-wrap gap-2 p-4 bg-gray-50 dark:bg-gray-700 rounded-lg min-h-[60px]">
            @forelse($numbers as $index => $number)
                <div class="group relative">
                    <!-- Number box -->
                    <div class="relative px-4 py-3 rounded-lg font-mono text-lg font-semibold transition-all duration-200
                                @if($status === 'found' && $maxIndex === $index)
                                    bg-red-500 text-white ring-4 ring-red-300 dark:ring-red-700
                                @elseif($status === 'found' && $minIndex === $index)
                                    bg-blue-500 text-white ring-4 ring-blue-300 dark:ring-blue-700
                                @elseif($currentIndex === $index)
                                    bg-yellow-400 text-gray-900 ring-4 ring-yellow-300
                                @else
                                    bg-white dark:bg-gray-600 text-gray-900 dark:text-white border-2 border-gray-300 dark:border-gray-500
                                @endif">
                        {{ $number }}
                        
                        <!-- Mobile overlay for tap detection -->
                        <div class="absolute inset-0 z-10 md:hidden"></div>
                        
                        <!-- Delete button -->
                        <button wire:click="removeNumber({{ $index }})"
                                class="absolute -top-2 -right-2 w-6 h-6 bg-red-500 hover:bg-red-600 text-white rounded-full text-xs font-bold
                                       opacity-0 md:group-hover:opacity-100 transition-opacity duration-200 z-20 md:pointer-events-auto
                                       flex items-center justify-center shadow-lg">
                            ×
                        </button>
                    </div>
                    
                    <!-- Index label -->
                    <div class="text-center text-xs text-gray-500 dark:text-gray-400 mt-1">
                        índice {{ $index }}
                    </div>
                </div>
            @empty
                <div class="text-gray-500 dark:text-gray-400 italic">Array vazio</div>
            @endforelse
        </div>
        
        <!-- Legend -->
        <div class="flex flex-wrap gap-4 mt-3 text-sm">
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-yellow-400 rounded"></div>
                <span class="text-gray-700 dark:text-gray-300">Verificando agora</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-red-500 rounded"></div>
                <span class="text-gray-700 dark:text-gray-300">Máximo</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-blue-500 rounded"></div>
                <span class="text-gray-700 dark:text-gray-300">Mínimo</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-white dark:bg-gray-600 border-2 border-gray-300 dark:border-gray-500 rounded"></div>
                <span class="text-gray-700 dark:text-gray-300">Não verificado</span>
            </div>
        </div>
    </div>

    <!-- Action Button -->
    <div class="mb-6">
        <button wire:click="findMaxMin" 
                class="w-full px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg 
                       transition-colors duration-200 shadow-md hover:shadow-lg">
            🔍 Encontrar Máximo e Mínimo
        </button>
    </div>

    <!-- Results -->
    @if($status === 'found')
        <div class="mb-6 grid md:grid-cols-2 gap-4">
            <!-- Maximum -->
            <div class="p-4 rounded-lg bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800">
                <div class="flex items-start gap-3">
                    <span class="text-2xl">🔴</span>
                    <div class="flex-1">
                        <h4 class="font-semibold text-red-800 dark:text-red-300 mb-1">
                            Valor Máximo
                        </h4>
                        <p class="text-2xl font-bold text-red-600 dark:text-red-400 mb-1">
                            {{ $maxValue }}
                        </p>
                        <p class="text-sm text-red-700 dark:text-red-400">
                            Posição: {{ $maxIndex }}
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Minimum -->
            <div class="p-4 rounded-lg bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800">
                <div class="flex items-start gap-3">
                    <span class="text-2xl">🔵</span>
                    <div class="flex-1">
                        <h4 class="font-semibold text-blue-800 dark:text-blue-300 mb-1">
                            Valor Mínimo
                        </h4>
                        <p class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-1">
                            {{ $minValue }}
                        </p>
                        <p class="text-sm text-blue-700 dark:text-blue-400">
                            Posição: {{ $minIndex }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="mb-6 p-4 rounded-lg bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800">
            <div class="flex items-start gap-3">
                <span class="text-2xl">✅</span>
                <div class="flex-1">
                    <h4 class="font-semibold text-green-800 dark:text-green-300 mb-1">
                        Busca Concluída
                    </h4>
                    <p class="text-sm text-green-700 dark:text-green-400">
                        Encontrados após {{ $comparisons }} comparações em {{ count($numbers) }} elementos.
                    </p>
                </div>
            </div>
        </div>
    @elseif($status === 'error')
        <div class="mb-6 p-4 rounded-lg bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800">
            <div class="flex items-start gap-3">
                <span class="text-2xl">⚠️</span>
                <div class="flex-1">
                    <h4 class="font-semibold text-yellow-800 dark:text-yellow-300">
                        Erro na busca
                    </h4>
                </div>
            </div>
        </div>
    @endif

    <!-- Step-by-step visualization -->
    @if(!empty($steps))
        <div class="mb-6">
            <h4 class="font-semibold text-gray-900 dark:text-white mb-3">Passo a Passo:</h4>
            <div class="bg-gray-50 dark:bg-gray-900 rounded-lg p-4 max-h-64 overflow-y-auto">
                <div class="space-y-1 font-mono text-sm">
                    @foreach($steps as $step)
                        <div class="text-gray-700 dark:text-gray-300">{{ $step }}</div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    <!-- Explanation -->
    <details class="group">
        <summary class="cursor-pointer list-none">
            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-purple-50 to-pink-50 
                        dark:from-purple-900/20 dark:to-pink-900/20 rounded-lg hover:from-purple-100 
                        hover:to-pink-100 dark:hover:from-purple-900/30 dark:hover:to-pink-900/30 transition-colors">
                <span class="font-semibold text-gray-900 dark:text-white">
                    💡 Ver Explicação Completa
                </span>
                <svg class="w-5 h-5 text-gray-600 dark:text-gray-400 transition-transform group-open:rotate-180" 
                     fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                </svg>
            </div>
        </summary>
        
        <div class="mt-4 p-6 bg-white dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
            <h4 class="font-bold text-lg text-gray-900 dark:text-white mb-3">
                📊 Como encontrar Máximo e Mínimo?
            </h4>
            
            <div class="space-y-4 text-gray-700 dark:text-gray-300">
                <p>
                    Para ter certeza que encontramos o <strong>maior e menor valor</strong>, 
                    precisamos verificar <strong>todos os elementos</strong> do array. Não há atalho!
                </p>
                
                <div class="bg-gray-50 dark:bg-gray-800 rounded-md p-4">
                    <h5 class="font-semibold mb-2 text-gray-900 dark:text-white">📋 Algoritmo:</h5>
                    <ol class="list-decimal list-inside space-y-1 text-sm">
                        <li>Inicie max e min com o primeiro elemento</li>
                        <li>Percorra o restante do array</li>
                        <li>Para cada elemento, compare com max atual</li>
                        <li>Se maior, atualize max</li>
                        <li>Compare também com min atual</li>
                        <li>Se menor, atualize min</li>
                        <li>Continue até o final</li>
                    </ol>
                </div>
                
                <div class="bg-green-50 dark:bg-green-900/20 rounded-md p-4">
                    <h5 class="font-semibold mb-2 text-green-800 dark:text-green-300">⏱️ Análise de Complexidade:</h5>
                    <ul class="space-y-1 text-sm text-green-700 dark:text-green-400">
                        <li>• <strong>Tempo:</strong> O(n) - precisa verificar todos os elementos</li>
                        <li>• <strong>Espaço:</strong> O(1) - usa apenas algumas variáveis</li>
                        <li>• <strong>Comparações:</strong> ~2n (duas por elemento: max e min)</li>
                        <li>• <strong>Inevitável:</strong> não há como fazer em menos de O(n)</li>
                    </ul>
                </div>
                
                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-md p-4">
                    <h5 class="font-semibold mb-2 text-blue-800 dark:text-blue-300">💡 Por que O(n)?</h5>
                    <p class="text-sm text-blue-700 dark:text-blue-400">
                        Mesmo que o array estivesse ordenado, você ainda precisaria olhar o primeiro e último elemento. 
                        Com array desordenado, é impossível saber max/min sem verificar cada um. 
                        <strong>É O(n) por natureza do problema!</strong>
                    </p>
                </div>
                
                <div class="bg-purple-50 dark:bg-purple-900/20 rounded-md p-4">
                    <h5 class="font-semibold mb-2 text-purple-800 dark:text-purple-300">🎯 Casos de Uso:</h5>
                    <ul class="space-y-1 text-sm text-purple-700 dark:text-purple-400">
                        <li>• Estatísticas (maior nota, menor temperatura)</li>
                        <li>• Validação de ranges</li>
                        <li>• Normalização de dados</li>
                        <li>• Análise de datasets</li>
                    </ul>
                </div>
            </div>
        </div>
    </details>
</div>

