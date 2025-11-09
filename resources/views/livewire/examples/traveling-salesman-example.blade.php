<div class="space-y-4">
    <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Número de Cidades (máx: 10)</label>
            <input type="number" min="2" max="10" step="1" wire:model.live.debounce.300ms="cities" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500" />
            <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">⚠️ Acima de 10 cidades leva MUITO tempo</p>
        </div>
        <div class="p-3 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
            <div class="text-xs font-medium text-blue-600 dark:text-blue-400">Rotas Testadas</div>
            <div class="text-xl font-bold text-blue-900 dark:text-blue-100">{{ number_format($routesTested) }}</div>
        </div>
        <div class="p-3 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-lg">
            <div class="text-xs font-medium text-orange-600 dark:text-orange-400">Tempo</div>
            <div class="text-xl font-bold text-orange-900 dark:text-orange-100">{{ number_format($timeMs, 2) }}ms</div>
        </div>
    </div>

    <button wire:click="run" class="w-full px-4 py-2 bg-green-600 hover:bg-green-700 text-white font-medium rounded-lg transition-colors">
        Encontrar Melhor Rota
    </button>

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

    @if ($bestRoute)
        <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
            <div class="text-sm font-medium text-green-800 dark:text-green-300 mb-2">✅ Melhor Rota Encontrada!</div>
            <div class="space-y-2">
                <div class="text-lg font-bold text-gray-900 dark:text-gray-100">
                    Distância Total: {{ number_format($bestDistance, 2) }} unidades
                </div>
                <div class="text-sm text-gray-700 dark:text-gray-300">
                    <strong>Rota:</strong>
                    @foreach ($bestRoute as $idx => $cityIdx)
                        {{ $cityList[$cityIdx]['name'] }}
                        @if ($idx < count($bestRoute) - 1)
                            <span class="text-green-600 dark:text-green-400">→</span>
                        @endif
                    @endforeach
                    <span class="text-green-600 dark:text-green-400">→</span>
                    {{ $cityList[$bestRoute[0]]['name'] }} <span class="text-xs text-gray-500">(volta pra casa)</span>
                </div>
            </div>
        </div>

        <!-- Visualização simples das cidades -->
        <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
            <div class="text-xs font-medium text-gray-600 dark:text-gray-400 mb-2">Localização das Cidades (mapa simplificado)</div>
            <div class="relative bg-white dark:bg-gray-800 rounded border border-gray-300 dark:border-gray-600" style="height: 300px;">
                @foreach ($cityList as $idx => $city)
                    <div class="absolute w-6 h-6 bg-blue-500 rounded-full flex items-center justify-center text-white text-xs font-bold shadow-lg" 
                         style="left: {{ $city['x'] }}%; top: {{ $city['y'] }}%; transform: translate(-50%, -50%);"
                         title="{{ $city['name'] }}">
                        {{ $idx + 1 }}
                    </div>
                @endforeach
            </div>
            <div class="mt-2 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-2 text-xs">
                @foreach ($cityList as $idx => $city)
                    <div class="text-gray-700 dark:text-gray-300">
                        <span class="inline-block w-5 h-5 bg-blue-500 rounded-full text-white text-center leading-5 text-xs font-bold">{{ $idx + 1 }}</span>
                        {{ $city['name'] }}
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
