<div class="space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Nº de discos (2–8)</label>
            <input type="number" min="2" max="8" step="1" wire:model.live.debounce.300ms="disks" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="p-3 bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg">
            <div class="text-xs font-medium text-purple-600 dark:text-purple-400">Movimentos</div>
            <div class="text-xl font-bold text-purple-900 dark:text-purple-100">{{ $moveCount }}</div>
        </div>
        <div class="p-3 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-lg">
            <div class="text-xs font-medium text-orange-600 dark:text-orange-400">Tempo</div>
            <div class="text-xl font-bold text-orange-900 dark:text-orange-100">{{ number_format($timeMs, 2) }}ms</div>
        </div>
    </div>

    <button wire:click="run" class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors">Resolver Torre de Hanói</button>

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
