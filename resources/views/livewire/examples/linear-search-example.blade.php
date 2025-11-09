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
                                @if($status === 'found' && $foundIndex === $index)
                                    bg-green-500 text-white ring-4 ring-green-300 dark:ring-green-700
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
                <div class="w-4 h-4 bg-green-500 rounded"></div>
                <span class="text-gray-700 dark:text-gray-300">Encontrado!</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-white dark:bg-gray-600 border-2 border-gray-300 dark:border-gray-500 rounded"></div>
                <span class="text-gray-700 dark:text-gray-300">Não verificado</span>
            </div>
        </div>
    </div>

    <!-- Search Controls -->
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Valor para Buscar:
        </label>
        <div class="flex flex-col sm:flex-row gap-2">
            <input type="number" 
                   wire:model="target" 
                   class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg 
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                          focus:ring-2 focus:ring-green-500 focus:border-transparent">
            <button wire:click="search" 
                    class="px-6 py-2 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg 
                           transition-colors duration-200 shadow-md hover:shadow-lg whitespace-nowrap">
                🔍 Buscar
            </button>
        </div>
    </div>

    <!-- Results -->
    @if($status)
        <div class="mb-6 p-4 rounded-lg
                    @if($status === 'found') bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800
                    @elseif($status === 'not-found') bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800
                    @else bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800
                    @endif">
            <div class="flex items-start gap-3">
                <span class="text-2xl">
                    @if($status === 'found') ✅
                    @elseif($status === 'not-found') ❌
                    @else ⚠️
                    @endif
                </span>
                <div class="flex-1">
                    <h4 class="font-semibold mb-1
                               @if($status === 'found') text-green-800 dark:text-green-300
                               @elseif($status === 'not-found') text-red-800 dark:text-red-300
                               @else text-yellow-800 dark:text-yellow-300
                               @endif">
                        @if($status === 'found')
                            Valor encontrado!
                        @elseif($status === 'not-found')
                            Valor não encontrado
                        @else
                            Erro na busca
                        @endif
                    </h4>
                    <p class="text-sm
                             @if($status === 'found') text-green-700 dark:text-green-400
                             @elseif($status === 'not-found') text-red-700 dark:text-red-400
                             @else text-yellow-700 dark:text-yellow-400
                             @endif">
                        @if($status === 'found')
                            O valor {{ $target }} está na posição {{ $foundIndex }} após {{ $comparisons }} comparações.
                        @elseif($status === 'not-found')
                            O valor {{ $target }} não existe no array. Verificamos todos os {{ $comparisons }} elementos.
                        @endif
                    </p>
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
            <div class="flex items-center justify-between p-4 bg-gradient-to-r from-green-50 to-emerald-50 
                        dark:from-green-900/20 dark:to-emerald-900/20 rounded-lg hover:from-green-100 
                        hover:to-emerald-100 dark:hover:from-green-900/30 dark:hover:to-emerald-900/30 transition-colors">
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
                🔍 Como funciona a Busca Linear?
            </h4>
            
            <div class="space-y-4 text-gray-700 dark:text-gray-300">
                <p>
                    A busca linear é o algoritmo de busca <strong>mais simples</strong>. Ela verifica cada elemento 
                    do array, um por um, até encontrar o valor procurado ou chegar ao final.
                </p>
                
                <div class="bg-gray-50 dark:bg-gray-800 rounded-md p-4">
                    <h5 class="font-semibold mb-2 text-gray-900 dark:text-white">📋 Passo a Passo:</h5>
                    <ol class="list-decimal list-inside space-y-1 text-sm">
                        <li>Comece no primeiro elemento (índice 0)</li>
                        <li>Compare o elemento atual com o valor procurado</li>
                        <li>Se encontrou, retorne o índice e pare</li>
                        <li>Se não, vá para o próximo elemento</li>
                        <li>Repita até encontrar ou chegar ao final</li>
                    </ol>
                </div>
                
                <div class="bg-green-50 dark:bg-green-900/20 rounded-md p-4">
                    <h5 class="font-semibold mb-2 text-green-800 dark:text-green-300">⏱️ Análise de Complexidade:</h5>
                    <ul class="space-y-1 text-sm text-green-700 dark:text-green-400">
                        <li>• <strong>Melhor caso:</strong> O(1) - elemento está na primeira posição</li>
                        <li>• <strong>Caso médio:</strong> O(n/2) ≈ O(n) - elemento está no meio</li>
                        <li>• <strong>Pior caso:</strong> O(n) - elemento está no final ou não existe</li>
                    </ul>
                </div>
                
                <div class="bg-blue-50 dark:bg-blue-900/20 rounded-md p-4">
                    <h5 class="font-semibold mb-2 text-blue-800 dark:text-blue-300">✅ Vantagens:</h5>
                    <ul class="space-y-1 text-sm text-blue-700 dark:text-blue-400">
                        <li>• Funciona com arrays <strong>desordenados</strong></li>
                        <li>• Muito simples de implementar</li>
                        <li>• Não requer preparação dos dados</li>
                    </ul>
                </div>
                
                <div class="bg-orange-50 dark:bg-orange-900/20 rounded-md p-4">
                    <h5 class="font-semibold mb-2 text-orange-800 dark:text-orange-300">❌ Desvantagens:</h5>
                    <ul class="space-y-1 text-sm text-orange-700 dark:text-orange-400">
                        <li>• Lento para arrays grandes (cresce linearmente)</li>
                        <li>• Busca Binária é muito mais rápida em dados ordenados</li>
                        <li>• Ineficiente quando precisa fazer muitas buscas</li>
                    </ul>
                </div>
            </div>
        </div>
    </details>
</div>

