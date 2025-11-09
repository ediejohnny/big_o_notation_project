<div class="space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">n</label>
            <input type="number" min="0" max="40" step="1" wire:model.live.debounce.300ms="n" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" />
        </div>
        <div class="p-3 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
            <div class="text-xs font-medium text-blue-600 dark:text-blue-400">Chamadas</div>
            <div class="text-xl font-bold text-blue-900 dark:text-blue-100">{{ $calls }}</div>
        </div>
        <div class="p-3 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-lg">
            <div class="text-xs font-medium text-orange-600 dark:text-orange-400">Tempo</div>
            <div class="text-xl font-bold text-orange-900 dark:text-orange-100">{{ number_format($timeMs, 2) }}ms</div>
        </div>
    </div>

    <button wire:click="run" class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg transition-colors">Calcular Fibonacci</button>

    @if (!is_null($result))
        <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
            <div class="text-sm font-medium text-green-800 dark:text-green-300">Resultado</div>
            <div class="mt-1 text-2xl font-bold text-gray-900 dark:text-gray-100">F(n) = {{ $result }}</div>
        </div>
    @endif

    @if (count($steps) > 0)
        <details class="mt-4">
            <summary class="cursor-pointer text-sm font-medium text-gray-700 dark:text-gray-300">Ver passos ({{ count($steps) }})</summary>
            <div class="mt-2 p-3 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg max-h-64 overflow-y-auto">
                <ul class="space-y-1 text-xs font-mono text-gray-700 dark:text-gray-300">
                    @foreach ($steps as $step)
                        <li>{{ $step }}</li>
                    @endforeach
                </ul>
            </div>
        </details>
    @endif
</div>
