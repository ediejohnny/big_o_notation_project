<div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 transition-colors duration-200">
    <h3 class="text-xl font-semibold text-gray-900 dark:text-white mb-4">
        🔍 Busca Binária
    </h3>
    
    <p class="text-gray-700 dark:text-gray-300 mb-6">
        A busca binária <strong>"corta o problema pela metade"</strong> a cada passo! Por isso é O(log n) - super rápida mesmo com milhões de elementos!
    </p>

    <!-- Important Notice -->
    <div class="bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4 mb-6">
        <div class="flex items-start gap-3">
            <span class="text-2xl">⚠️</span>
            <div>
                <h4 class="font-semibold text-yellow-900 dark:text-yellow-300 mb-1">Importante!</h4>
                <p class="text-sm text-yellow-800 dark:text-yellow-200">
                    A busca binária <strong>só funciona em arrays ORDENADOS</strong>! 
                    O array é automaticamente ordenado quando você adiciona ou remove números.
                </p>
            </div>
        </div>
    </div>

    <!-- Array Management -->
    <div class="mb-6">
        <div class="flex items-center justify-between mb-2">
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                Array Ordenado ({{ count($numbers) }} elementos):
            </label>
            <button wire:click="resetArray" 
                    class="text-xs px-3 py-1 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-700 dark:text-gray-300 rounded-md transition-colors">
                🔄 Resetar
            </button>
        </div>
        
        <!-- Array Visual -->
        <div class="flex flex-wrap gap-2 mb-3">
            @forelse($numbers as $i => $num)
                <div class="relative group">
                    <div class="flex flex-col items-center">
                        <span class="text-xs text-gray-500 dark:text-gray-400 mb-1">{{ $i }}</span>
                        <div class="relative">
                            <!-- Number button - desktop: click to search, mobile: handled by overlay -->
                            <button wire:click="selectNumber({{ $i }})"
                                    type="button"
                                    class="w-12 h-12 flex items-center justify-center rounded transition-all duration-200
                                           {{ $selectedForDeletion === $i ? 'pointer-events-none md:pointer-events-auto' : '' }}
                                           @if($foundIndex === $i && $status === 'found')
                                               bg-green-500 text-white ring-2 ring-green-300 scale-110
                                           @elseif($currentMiddle === $i)
                                               bg-blue-500 text-white ring-2 ring-blue-300 scale-110
                                           @elseif(isset($currentRange[0]) && isset($currentRange[1]) && $i >= $currentRange[0] && $i <= $currentRange[1] && $currentMiddle !== $i)
                                               bg-blue-100 dark:bg-blue-900/30 text-gray-800 dark:text-gray-200 ring-1 ring-blue-300
                                           @else
                                               bg-gray-100 dark:bg-gray-700 text-gray-500 dark:text-gray-400 opacity-50
                                           @endif">
                                {{ $num }}
                            </button>
                            <!-- Delete button - visible on hover (desktop) or when selected (mobile) -->
                            <button wire:click="removeNumber({{ $i }})"
                                    type="button"
                                    class="absolute -top-1 -right-1 w-5 h-5 bg-red-500 hover:bg-red-600 text-white rounded-full 
                                           transition-opacity text-xs font-bold flex items-center justify-center z-20
                                           {{ $selectedForDeletion === $i ? 'opacity-100' : 'opacity-0 md:group-hover:opacity-100 md:pointer-events-auto pointer-events-none' }}">
                                ×
                            </button>
                        </div>
                    </div>
                    <!-- Mobile only: overlay to handle first tap (toggle delete) or search if not selected -->
                    <button wire:click="toggleSelection({{ $i }})"
                            type="button"
                            class="absolute inset-0 md:hidden z-10 {{ $selectedForDeletion === $i ? 'pointer-events-none' : '' }}"
                            aria-label="Selecionar para exclusão">
                    </button>
                </div>
            @empty
                <div class="w-full text-center py-4 text-gray-500 dark:text-gray-400 text-sm">
                    Array vazio. Adicione números abaixo!
                </div>
            @endforelse
        </div>

        <!-- Legend -->
        <div class="flex flex-wrap gap-3 text-xs text-gray-600 dark:text-gray-400 mb-3">
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-blue-100 dark:bg-blue-900/30 ring-1 ring-blue-300 rounded"></div>
                <span>Intervalo atual</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-blue-500 rounded"></div>
                <span>Meio verificado</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-green-500 rounded"></div>
                <span>Encontrado!</span>
            </div>
            <div class="flex items-center gap-2">
                <div class="w-4 h-4 bg-gray-100 dark:bg-gray-700 rounded opacity-50"></div>
                <span>Fora do alcance</span>
            </div>
        </div>

        <!-- Add Number Form -->
        <div class="flex gap-2">
            <input type="number" 
                   wire:model="newNumber"
                   placeholder="Adicionar número"
                   class="flex-1 px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-md 
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                          focus:ring-2 focus:ring-blue-500 focus:border-transparent
                          placeholder-gray-400 dark:placeholder-gray-500">
            <button wire:click="addNumber" 
                    class="px-4 py-2 text-sm bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md transition-colors">
                ➕ Adicionar
            </button>
        </div>
        @if($addError)
            <p class="text-xs text-red-600 dark:text-red-400 mt-1">{{ $addError }}</p>
        @endif
        <p class="text-xs text-gray-500 dark:text-gray-400 mt-2">
            💡 <span class="hidden md:inline">Clique para buscar • Passe o mouse e clique no × para remover</span>
            <span class="md:hidden">Toque para buscar • Toque novamente para mostrar × e remover</span>
        </p>
    </div>

    <!-- Search Input -->
    <div class="mb-6">
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
            Número a Buscar:
        </label>
        <div class="flex flex-col sm:flex-row gap-2 sm:gap-4">
            <input type="number" 
                   wire:model.live="target"
                   class="flex-1 px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-md 
                          bg-white dark:bg-gray-700 text-gray-900 dark:text-white
                          focus:ring-2 focus:ring-blue-500 focus:border-transparent">
            <button wire:click="search" 
                    wire:loading.attr="disabled"
                    class="px-6 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-md 
                           transition-colors duration-200 disabled:opacity-50 whitespace-nowrap">
                <span wire:loading.remove>🔍 Buscar</span>
                <span wire:loading>Buscando...</span>
            </button>
        </div>
    </div>

    <!-- Result -->
    @if($status === 'found')
        <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-md">
            <p class="text-green-800 dark:text-green-300 font-medium">
                ✅ Encontrado no índice {{ $foundIndex }}!
            </p>
            <p class="text-green-700 dark:text-green-400 text-sm mt-1">
                Apenas {{ $comparisons }} {{ $comparisons === 1 ? 'comparação' : 'comparações' }}! 
                @if(count($numbers) > 0)
                    (Busca linear precisaria de até {{ count($numbers) }} comparações)
                @endif
            </p>
        </div>
    @elseif($status === 'not-found')
        <div class="mb-6 p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-md">
            <p class="text-red-800 dark:text-red-300 font-medium">
                ❌ Não encontrado
            </p>
            <p class="text-red-700 dark:text-red-400 text-sm mt-1">
                Foram {{ $comparisons }} comparações para confirmar que o valor não está no array.
            </p>
        </div>
    @elseif($status === 'error')
        <div class="mb-6 p-4 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-md">
            <p class="text-orange-800 dark:text-orange-300 font-medium">
                ⚠️ Digite um número válido para buscar
            </p>
        </div>
    @endif

    <!-- Steps Visualization -->
    @if(count($steps) > 0)
        <div class="mb-6">
            <h4 class="text-sm font-semibold text-gray-700 dark:text-gray-300 mb-2">📋 Passo a Passo:</h4>
            <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4 space-y-1 max-h-80 overflow-y-auto">
                @foreach($steps as $step)
                    <div class="flex items-start gap-2 text-sm font-mono
                        @if(str_contains($step, '✅'))
                            text-green-700 dark:text-green-400 font-semibold
                        @elseif(str_contains($step, '❌'))
                            text-red-700 dark:text-red-400 font-semibold
                        @elseif(str_contains($step, '🔍'))
                            text-blue-700 dark:text-blue-400 font-semibold
                        @elseif(str_contains($step, '⬅️') || str_contains($step, '➡️'))
                            text-purple-700 dark:text-purple-400
                        @else
                            text-gray-600 dark:text-gray-400
                        @endif">
                        <span class="text-blue-500 mt-0.5">→</span>
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
                <h5 class="font-semibold text-gray-900 dark:text-white mb-2">🎯 Por que é O(log n)?</h5>
                <p class="text-gray-700 dark:text-gray-300 text-sm mb-2">
                    A cada passo, a busca binária <strong>divide o problema pela metade</strong>. Se você tem 1000 elementos:
                </p>
                <ul class="text-sm text-gray-700 dark:text-gray-300 space-y-1 ml-4">
                    <li>• Passo 1: 1000 elementos → verifica o meio → sobram 500</li>
                    <li>• Passo 2: 500 elementos → verifica o meio → sobram 250</li>
                    <li>• Passo 3: 250 elementos → verifica o meio → sobram 125</li>
                    <li>• E assim por diante...</li>
                </ul>
                <p class="text-gray-700 dark:text-gray-300 text-sm mt-2">
                    Com 1000 elementos, precisa de no máximo <strong>10 passos</strong> (log₂ 1000 ≈ 10)!
                </p>
            </div>
            
            <div>
                <h5 class="font-semibold text-gray-900 dark:text-white mb-2">💻 Código Explicado:</h5>
                <pre class="bg-gray-900 text-gray-100 p-4 rounded-md text-xs overflow-x-auto"><code>// O(log n) - Busca Binária
function binarySearch($array, $target) {
    $left = 0;
    $right = count($array) - 1;
    
    while ($left <= $right) {
        // Calcula o meio
        $middle = floor(($left + $right) / 2);
        
        // Encontrou!
        if ($array[$middle] === $target) {
            return $middle;
        }
        
        // Valor procurado é menor? Buscar na esquerda
        if ($array[$middle] > $target) {
            $right = $middle - 1;  // ← Corta metade direita
        }
        
        // Valor procurado é maior? Buscar na direita
        if ($array[$middle] < $target) {
            $left = $middle + 1;   // ← Corta metade esquerda
        }
    }
    
    return -1; // Não encontrado
}</code></pre>
            </div>

            <div>
                <h5 class="font-semibold text-gray-900 dark:text-white mb-2">⚡ Comparação de Performance:</h5>
                <div class="space-y-2 text-sm">
                    <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-600">
                        <span class="text-gray-700 dark:text-gray-300 font-medium">10 elementos</span>
                        <div class="text-right">
                            <div class="text-gray-600 dark:text-gray-400">Linear: até 10</div>
                            <div class="text-green-600 dark:text-green-400 font-semibold">Binária: até 4</div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-600">
                        <span class="text-gray-700 dark:text-gray-300 font-medium">100 elementos</span>
                        <div class="text-right">
                            <div class="text-gray-600 dark:text-gray-400">Linear: até 100</div>
                            <div class="text-green-600 dark:text-green-400 font-semibold">Binária: até 7</div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center py-2 border-b border-gray-200 dark:border-gray-600">
                        <span class="text-gray-700 dark:text-gray-300 font-medium">1.000 elementos</span>
                        <div class="text-right">
                            <div class="text-gray-600 dark:text-gray-400">Linear: até 1.000</div>
                            <div class="text-green-600 dark:text-green-400 font-semibold">Binária: até 10</div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center py-2">
                        <span class="text-gray-700 dark:text-gray-300 font-medium">1.000.000</span>
                        <div class="text-right">
                            <div class="text-gray-600 dark:text-gray-400">Linear: até 1.000.000</div>
                            <div class="text-green-600 dark:text-green-400 font-semibold">Binária: até 20</div>
                        </div>
                    </div>
                </div>
                <p class="text-sm text-gray-700 dark:text-gray-300 mt-3 font-medium">
                    Viu a diferença? Por isso O(log n) é <strong>extremamente eficiente</strong>!
                </p>
            </div>
        </div>
    </details>
</div>
