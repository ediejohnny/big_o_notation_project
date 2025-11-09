<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * QuickSortExample
 *
 * Demonstrates O(n log n) average time complexity using Quick Sort.
 * Users can edit the input array, run the algorithm, and see steps and metrics.
 */
class QuickSortExample extends Component
{
    public string $input = '8,3,1,7,0,10,2';
    public array $numbers = [];
    public array $sorted = [];

    // Metrics
    public int $comparisons = 0;
    public int $swaps = 0;
    public int $recursionDepth = 0;
    public float $timeMs = 0.0;

    public array $steps = [];

    public function mount(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->sorted = [];
        $this->steps = [];
        $this->comparisons = 0;
        $this->swaps = 0;
        $this->recursionDepth = 0;
        $this->timeMs = 0.0;
    }

    public function updatedInput(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->sorted = [];
        $this->steps = [];
        $this->comparisons = 0;
        $this->swaps = 0;
        $this->recursionDepth = 0;
        $this->timeMs = 0.0;
    }

    /**
     * Run quick sort and collect metrics
     */
    public function run(): void
    {
        $this->steps = [];
        $this->comparisons = 0;
        $this->swaps = 0;
        $this->recursionDepth = 0;
        $start = microtime(true);

        $result = $this->numbers;
        $this->quickSort($result, 0, count($result) - 1, 1);

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
     * Quick sort in-place (O(n log n) average)
     *
     * @param array<int> $arr (passed by reference)
     * @param int $low
     * @param int $high
     * @param int $depth Recursion depth for metrics
     */
    private function quickSort(array &$arr, int $low, int $high, int $depth): void
    {
        if ($low < $high) {
            $this->recursionDepth = max($this->recursionDepth, $depth);
            $this->steps[] = "📊 Nível {$depth}: ordenando posições [{$low}..{$high}]";

            $pivotIndex = $this->partition($arr, $low, $high);

            // Recursively sort the two partitions
            $this->quickSort($arr, $low, $pivotIndex - 1, $depth + 1);
            $this->quickSort($arr, $pivotIndex + 1, $high, $depth + 1);
        }
    }

    /**
     * Partition array around pivot (Lomuto scheme)
     *
     * @param array<int> $arr
     * @param int $low
     * @param int $high
     * @return int Final position of pivot
     */
    private function partition(array &$arr, int $low, int $high): int
    {
        $pivot = $arr[$high];
        $this->steps[] = "🎯 Pivô escolhido: {$pivot} (posição {$high})";

        $i = $low - 1;

        for ($j = $low; $j < $high; $j++) {
            $this->comparisons++;
            $this->steps[] = "🔍 Comparando {$arr[$j]} com pivô {$pivot}";

            if ($arr[$j] <= $pivot) {
                $i++;
                if ($i !== $j) {
                    $this->swap($arr, $i, $j);
                    $this->swaps++;
                    $this->steps[] = "→ Trocou {$arr[$i]} ↔ {$arr[$j]} (menor/igual que pivô)";
                }
            }
        }

        // Place pivot in correct position
        $i++;
        if ($i !== $high) {
            $this->swap($arr, $i, $high);
            $this->swaps++;
            $this->steps[] = "→ Colocou pivô na posição final {$i}";
        }

        return $i;
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
        return \view('livewire.examples.quick-sort-example');
    }
}
