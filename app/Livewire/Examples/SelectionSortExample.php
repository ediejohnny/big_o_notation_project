<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * SelectionSortExample
 *
 * Demonstrates O(n²) time complexity using Selection Sort.
 * Users can edit the input array, run the algorithm, and see steps and metrics.
 */
class SelectionSortExample extends Component
{
    public string $input = '29,10,14,37,13';
    public array $numbers = [];
    public array $sorted = [];

    // Metrics
    public int $comparisons = 0;
    public int $swaps = 0;
    public float $timeMs = 0.0;

    public array $steps = [];

    public function mount(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->sorted = [];
        $this->steps = [];
        $this->comparisons = 0;
        $this->swaps = 0;
        $this->timeMs = 0.0;
    }

    public function updatedInput(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->sorted = [];
        $this->steps = [];
        $this->comparisons = 0;
        $this->swaps = 0;
        $this->timeMs = 0.0;
    }

    /**
     * Run selection sort and collect metrics
     */
    public function run(): void
    {
        $this->steps = [];
        $this->comparisons = 0;
        $this->swaps = 0;
        $start = microtime(true);

        $result = $this->numbers;
        $this->selectionSort($result);

        $elapsed = microtime(true) - $start;
        $this->timeMs = $elapsed * 1000.0;
        $this->sorted = $result;
    }

    /**
     * Parse comma/space separated numbers into array<int>
     */
    private function parseInput(string $raw): array
    {
        $clean = preg_replace('/[^\d,\-\s]/', '', $raw ?? '');
        if ($clean === null) {
            return [];
        }

        $parts = preg_split('/[\s,]+/', trim($clean));
        if ($parts === false) {
            return [];
        }

        $nums = [];
        foreach ($parts as $p) {
            if ($p === '') {
                continue;
            }

            $nums[] = (int) $p;
        }

        return $nums;
    }

    /**
     * Selection sort implementation (O(n²))
     *
     * @param array<int> $arr (passed by reference)
     */
    private function selectionSort(array &$arr): void
    {
        $n = count($arr);

        if ($n <= 1) {
            return;
        }

        $this->steps[] = "🎯 Iniciando Selection Sort com {$n} elementos";

        // Loop through array positions
        for ($i = 0; $i < $n - 1; $i++) {
            $minIndex = $i;
            $this->steps[] = "--- Procurando o menor elemento para posição {$i} ---";
            $this->steps[] = "Assumindo que {$arr[$i]} (posição {$i}) é o menor";

            // Find minimum in remaining unsorted portion
            for ($j = $i + 1; $j < $n; $j++) {
                $this->comparisons++;
                $this->steps[] = "Compara {$arr[$minIndex]} com {$arr[$j]}";

                if ($arr[$j] < $arr[$minIndex]) {
                    $minIndex = $j;
                    $this->steps[] = "→ Novo menor encontrado: {$arr[$minIndex]} na posição {$minIndex}";
                }
            }

            // Swap minimum with current position if needed
            if ($minIndex !== $i) {
                $this->steps[] = "Troca {$arr[$i]} (posição {$i}) com {$arr[$minIndex]} (posição {$minIndex})";
                $this->swap($arr, $i, $minIndex);
                $this->swaps++;
                $this->steps[] = "Array agora: [" . implode(', ', $arr) . "]";
                continue;
            }

            $this->steps[] = "{$arr[$i]} já está no lugar certo (é o menor)";
        }

        $this->steps[] = "🎉 Ordenação completa!";
    }

    /**
     * Swap two elements
     */
    private function swap(array &$arr, int $i, int $j): void
    {
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }

    public function render()
    {
        return view('livewire.examples.selection-sort-example');
    }
}
