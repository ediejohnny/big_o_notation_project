<div class="space-y-4">
    <div>
        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Itens (separados por vírgula, máx: 20)</label>
        <input type="text" wire:model.live.debounce.300ms="itemsInput" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" placeholder="a,b,c,d,e" />
        <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">⚠️ Mais de 20 itens geram milhões de subconjuntos</p>
    </div>

    <button wire:click="run" class="w-full px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white font-medium rounded-lg transition-colors">Gerar Subconjuntos</button>

    @if ($errorMessage)
        <div class="p-4 bg-red-50 dark:bg-red-900/20 border-2 border-red-300 dark:border-red-800 rounded-lg">
            <div class="flex items-start">
                <div class="flex-shrink-0">
                    <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                </div>
                <div class="ml-3">
                    <h3 class="text-sm font-medium text-red-800 dark:text-red-300">Erro de Validação</h3>
                    <div class="mt-2 text-sm text-red-700 dark:text-red-400">{{ $errorMessage }}</div>
                </div>
            </div>
        </div>
    @endif

    @if ($subsetCount > 0)
        <div class="grid grid-cols-3 gap-3">
            <div class="p-3 bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg">
                <div class="text-xs font-medium text-purple-600 dark:text-purple-400">Itens</div>
                <div class="text-xl font-bold text-purple-900 dark:text-purple-100">{{ count($items) }}</div>
            </div>
            <div class="p-3 bg-pink-50 dark:bg-pink-900/20 border border-pink-200 dark:border-pink-800 rounded-lg">
                <div class="text-xs font-medium text-pink-600 dark:text-pink-400">Subconjuntos</div>
                <div class="text-xl font-bold text-pink-900 dark:text-pink-100">{{ $subsetCount }}</div>
            </div>
            <div class="p-3 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-lg">
                <div class="text-xs font-medium text-orange-600 dark:text-orange-400">Tempo</div>
                <div class="text-xl font-bold text-orange-900 dark:text-orange-100">{{ number_format($timeMs, 2) }}ms</div>
            </div>
        </div>
    @endif

    @if ($subsetCount > 0)
        <details class="mt-4">
            <summary class="cursor-pointer text-sm font-medium text-gray-700 dark:text-gray-300">Ver subconjuntos (limitado)</summary>
            <div class="mt-2 p-3 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg max-h-64 overflow-y-auto">
                <ul class="space-y-1 text-xs font-mono text-gray-700 dark:text-gray-300">
                    @foreach ($subsets as $idx => $subset)
                        @if ($idx < 128)
                            <li>{{ $idx }}: [{{ implode(',', $subset) }}]</li>
                        @endif
                    @endforeach
                </ul>
            </div>
        </details>
    @endif

    @if (count($steps) > 0)
        <details class="mt-4">
            <summary class="cursor-pointer text-sm font-medium text-gray-700 dark:text-gray-300">Passos ({{ count($steps) }})</summary>
            <div class="mt-2 p-3 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg max-h-48 overflow-y-auto">
                <ul class="space-y-1 text-xs font-mono text-gray-700 dark:text-gray-300">
                    @foreach ($steps as $s)
                        <li>{{ $s }}</li>
                    @endforeach
                </ul>
            </div>
        </details>
    @endif
</div>
