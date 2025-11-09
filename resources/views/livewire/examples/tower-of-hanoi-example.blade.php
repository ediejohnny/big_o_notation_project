<div class="space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nº de discos (máx: 25)</label>
            <input type="number" min="1" max="25" step="1" wire:model.live.debounce.300ms="disks" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">⚠️ Acima de 25 discos gera milhões de movimentos</p>
        </div>
        <div class="p-3 bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg">
            <div class="text-xs font-medium text-purple-600 dark:text-purple-400">Movimentos</div>
            <div class="text-xl font-bold text-purple-900 dark:text-purple-100">{{ number_format($moveCount) }}</div>
        </div>
        <div class="p-3 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-lg">
            <div class="text-xs font-medium text-orange-600 dark:text-orange-400">Tempo</div>
            <div class="text-xl font-bold text-orange-900 dark:text-orange-100">{{ number_format($timeMs, 2) }}ms</div>
        </div>
    </div>

    <button wire:click="run" class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors">Resolver Torre de Hanói</button>

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

    @if ($moveCount > 0)
        <details class="mt-4">
            <summary class="cursor-pointer text-sm font-medium text-gray-700 dark:text-gray-300">Ver movimentos ({{ $moveCount }})</summary>
            <div class="mt-2 p-3 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg max-h-64 overflow-y-auto">
                <ul class="space-y-1 text-xs font-mono text-gray-700 dark:text-gray-300">
                    @foreach ($moves as $m)
                        <li>{{ $m }}</li>
                    @endforeach
                </ul>
            </div>
        </details>
    @endif
</div>
