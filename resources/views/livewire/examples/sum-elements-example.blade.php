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
                                @if($currentIndex !== null && $index < $currentIndex)
                                    bg-green-100 dark:bg-green-800 text-gray-900 dark:text-white border-2 border-green-400 dark:border-green-600
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
                <span class="text-gray-700 dark:text-gray-300">Somando agora</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-green-100 dark:bg-green-800 border-2 border-green-400 dark:border-green-600 rounded"></div>
                <span class="text-gray-700 dark:text-gray-300">Já somado</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-white dark:bg-gray-600 border-2 border-gray-300 dark:border-gray-500 rounded"></div>
                <span class="text-gray-700 dark:text-gray-300">Pendente</span>
            </div>
        </div>
    </div>

    <!-- Action Button -->
    <div class="mb-6">
        <button wire:click="calculateSum" 
                class="w-full px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg 
                       transition-colors duration-200 shadow-md hover:shadow-lg">
            🧮 Calcular Soma e Média
        </button>
    </div>

    <!-- Running Sum Display -->
    @if($runningSum !== null)
        <div class="mb-6">
            <div class="bg-gradient-to-r from-indigo-50 to-purple-50 dark:from-indigo-900/20 dark:to-purple-900/20 rounded-lg p-4 border border-indigo-200 dark:border-indigo-800">
                <div class="text-center">
                    <div class="text-sm text-gray-600 dark:text-gray-400 mb-1">Soma Parcial</div>
                    <div class="text-4xl font-bold text-indigo-600 dark:text-indigo-400">
                        {{ $runningSum }}
                    </div>
                </div>
            </div>
        </div>
    @endif

    <!-- Final Results -->
    @if($status === 'calculated')
        <div class="mb-6 grid md:grid-cols-2 gap-4">
            <!-- Sum -->
            <div class="p-4 rounded-lg bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-200 dark:border-indigo-800">
                <div class="flex items-start gap-3">
                    <span class="text-2xl">➕</span>
                    <div class="flex-1">
                        <h4 class="font-semibold text-indigo-800 dark:text-indigo-300 mb-1">
                            Soma Total
                        </h4>
                        <p class="text-3xl font-bold text-indigo-600 dark:text-indigo-400 mb-1">
                            {{ $sum }}
                        </p>
                        <p class="text-sm text-indigo-700 dark:text-indigo-400">
                            {{ count($numbers) }} elementos somados
                        </p>
                    </div>
                </div>
            </div>
            
            <!-- Average -->
            <div class="p-4 rounded-lg bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800">
                <div class="flex items-start gap-3">
                    <span class="text-2xl">📊</span>
                    <div class="flex-1">
                        <h4 class="font-semibold text-purple-800 dark:text-purple-300 mb-1">
                            Média
                        </h4>
                        <p class="text-3xl font-bold text-purple-600 dark:text-purple-400 mb-1">
                            {{ $average }}
                        </p>
                        <p class="text-sm text-purple-700 dark:text-purple-400">
                            {{ $sum }} ÷ {{ count($numbers) }}
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
                        Cálculo Concluído
                    </h4>
                    <p class="text-sm text-green-700 dark:text-green-400">
                        Processados {{ $iterations }} elementos com complexidade O(n).
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
                        Erro no cálculo
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
            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-indigo-50 to-purple-50 
                        dark:from-indigo-900/20 dark:to-purple-900/20 rounded-lg hover:from-indigo-100 
                        hover:to-purple-100 dark:hover:from-indigo-900/30 dark:hover:to-purple-900/30 transition-colors">
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
                🧮 Como funciona a Soma de Elementos?
            </h4>
            
            <div class="space-y-4 text-gray-700 dark:text-gray-300">
                <p>
                    Calcular a soma é um dos exemplos <strong>mais puros</strong> de complexidade O(n). 
                    É impossível somar todos os números sem olhar cada um deles!
                </p>
                
                <div class="bg-gray-50 dark:bg-gray-800 rounded-md p-4">
                    <h5 class="font-semibold mb-2 text-gray-900 dark:text-white">📋 Algoritmo:</h5>
                    <ol class="list-decimal list-inside space-y-1 text-sm">
                        <li>Inicie a soma com 0</li>
                        <li>Percorra cada elemento do array</li>
                        <li>Adicione o elemento atual à soma</li>
                        <li>Continue até processar todos</li>
                        <li>A soma final é o resultado</li>
                    </ol>
                </div>
                
                <div class="bg-green-50 dark:bg-green-900/20 rounded-md p-4">
                    <h5 class="font-semibold mb-2 text-green-800 dark:text-green-300">⏱️ Análise de Complexidade:</h5>
                    <ul class="space-y-1 text-sm text-green-700 dark:text-green-400">
                        <li>• <strong>Tempo:</strong> O(n) - uma passada pelos elementos</li>
                        <li>• <strong>Espaço:</strong> O(1) - apenas uma variável para soma</li>
                        <li>• <strong>Operações:</strong> Exatamente n adições</li>
                        <li>• <strong>Inevitável:</strong> não existe forma mais rápida!</li>
                    </ul>
                </div>
                
                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-md p-4">
                    <h5 class="font-semibold mb-2 text-blue-800 dark:text-blue-300">💡 Por que sempre O(n)?</h5>
                    <p class="text-sm text-blue-700 dark:text-blue-400 mb-2">
                        Diferente de busca (onde podemos usar binary search), somar TODOS os números é uma operação que 
                        <strong>requer visitar cada elemento</strong>. Não há atalho possível!
                    </p>
                    <p class="text-sm text-blue-700 dark:text-blue-400">
                        10 números = 10 operações<br>
                        100 números = 100 operações<br>
                        1000 números = 1000 operações
                    </p>
                </div>
                
                <div class="bg-indigo-50 dark:bg-indigo-900/20 rounded-md p-4">
                    <h5 class="font-semibold mb-2 text-indigo-800 dark:text-indigo-300">🎯 Casos de Uso:</h5>
                    <ul class="space-y-1 text-sm text-indigo-700 dark:text-indigo-400">
                        <li>• Calcular totais (vendas, pontuações, etc.)</li>
                        <li>• Estatísticas básicas (soma, média)</li>
                        <li>• Agregações em geral</li>
                        <li>• Processamento de dados numéricos</li>
                    </ul>
                </div>
            </div>
        </div>
    </details>
</div>

