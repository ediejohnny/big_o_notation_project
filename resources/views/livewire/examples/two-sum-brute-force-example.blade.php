<div class="space-y-4">
    <!-- Input -->
    <div class="grid md:grid-cols-2 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Array de números:
            </label>
            <input
                type="text"
                wire:model.live.debounce.500ms="input"
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="2,7,11,15,3"
            />
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">
                Alvo (soma desejada):
            </label>
            <input
                type="number"
                wire:model.live.debounce.500ms="target"
                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500"
                placeholder="9"
            />
        </div>
    </div>

    <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
        <span class="font-mono">[{{ implode(', ', $numbers) }}]</span>
        <span>→ {{ count($numbers) }} elementos</span>
        <span class="ml-3">🎯 Alvo: {{ $target }}</span>
    </div>

    <!-- Run button -->
    <button
        wire:click="run"
        class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white font-medium rounded-lg transition-colors"
    >
        Buscar dois números (Força Bruta)
    </button>

    <!-- Results -->
    @if ($result !== null)
        <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
            <div class="text-sm font-medium text-green-800 dark:text-green-300">✅ Encontrado!</div>
            <div class="mt-1 font-mono text-green-900 dark:text-green-200">
                {{ $result[0] }} + {{ $result[1] }} = {{ $target }}
            </div>
        </div>
    @elseif (count($steps) > 0 && $result === null)
        <div class="p-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
            <div class="text-sm font-medium text-red-800 dark:text-red-300">❌ Não encontrado</div>
            <div class="mt-1 text-sm text-red-900 dark:text-red-200">
                Nenhuma combinação de dois números soma {{ $target }}
            </div>
        </div>
    @endif

    <!-- Metrics -->
    @if ($comparisons > 0 || $additions > 0)
        <div class="grid grid-cols-3 gap-3">
            <div class="p-3 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
                <div class="text-xs font-medium text-blue-600 dark:text-blue-400">Comparações</div>
                <div class="text-xl font-bold text-blue-900 dark:text-blue-100">{{ $comparisons }}</div>
            </div>
            <div class="p-3 bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg">
                <div class="text-xs font-medium text-purple-600 dark:text-purple-400">Somas</div>
                <div class="text-xl font-bold text-purple-900 dark:text-purple-100">{{ $additions }}</div>
            </div>
            <div class="p-3 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-lg">
                <div class="text-xs font-medium text-orange-600 dark:text-orange-400">Tempo</div>
                <div class="text-xl font-bold text-orange-900 dark:text-orange-100">{{ number_format($timeMs, 2) }}ms</div>
            </div>
        </div>
        <div class="mt-2 p-3 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-lg">
            <p class="text-xs text-red-700 dark:text-red-300">
                ⚠️ <strong>Muito ineficiente!</strong> Com {{ count($numbers) }} números, testamos 
                {{ $comparisons }} combinações. Com 1.000 números seriam ~500.000 combinações!
                <br>💡 Existe solução O(n) usando HashMap — veja na página O(n) Linear!
            </p>
        </div>
    @endif

    <!-- Steps (collapsed if many) -->
    @if (count($steps) > 0)
        <details class="mt-4">
            <summary class="cursor-pointer text-sm font-medium text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-gray-100">
                Ver passos ({{ count($steps) }} operações)
            </summary>
            <div class="mt-2 p-3 bg-gray-50 dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg max-h-60 overflow-y-auto">
                <ul class="space-y-1 text-xs font-mono text-gray-700 dark:text-gray-300">
                    @foreach ($steps as $step)
                        <li>{{ $step }}</li>
                    @endforeach
                </ul>
            </div>
        </details>
    @endif
</div>
