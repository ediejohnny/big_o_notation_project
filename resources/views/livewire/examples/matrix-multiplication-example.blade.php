<div class="space-y-4">
    <div class="grid md:grid-cols-2 gap-4">
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Matriz A (linhas por quebra de linha, números por vírgula)</label>
            <textarea wire:model.live.debounce.500ms="matrixA" rows="5" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">1,2,3
4,5,6
7,8,9</textarea>
        </div>
        <div>
            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-1">Matriz B (linhas por quebra de linha, números por vírgula)</label>
            <textarea wire:model.live.debounce.500ms="matrixB" rows="5" class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500">9,8,7
6,5,4
3,2,1</textarea>
        </div>
    </div>

    <button wire:click="run" class="w-full px-4 py-2 bg-teal-600 hover:bg-teal-700 text-white font-medium rounded-lg transition-colors">
        Multiplicar Matrizes (Ingênua)
    </button>

    @if (!empty($C))
        <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
            <div class="text-sm font-medium text-green-800 dark:text-green-300">Resultado C = A x B</div>
            <div class="mt-2 overflow-x-auto">
                <table class="min-w-full text-sm">
                    <tbody>
                        @foreach ($C as $row)
                            <tr>
                                @foreach ($row as $val)
                                    <td class="px-2 py-1 font-mono text-gray-900 dark:text-gray-100">{{ $val }}</td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

    @if ($multiplications > 0 || $additions > 0)
        <div class="grid grid-cols-3 gap-3">
            <div class="p-3 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
                <div class="text-xs font-medium text-blue-600 dark:text-blue-400">Multiplicações</div>
                <div class="text-xl font-bold text-blue-900 dark:text-blue-100">{{ $multiplications }}</div>
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
    @endif

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
