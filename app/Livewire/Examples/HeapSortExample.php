<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * HeapSortExample
 *
 * Demonstrates O(n log n) time complexity using Heap Sort.
 * Users can edit the input array, run the algorithm, and see steps and metrics.
 */
class HeapSortExample extends Component
{
    public string $input = '12,11,13,5,6,7';
    public array $numbers = [];
    public array $sorted = [];

    // Metrics
    public int $comparisons = 0;
    public int $swaps = 0;
    public int $heapifyOps = 0; // count of heapify operations
    public float $timeMs = 0.0;

    public array $steps = [];

    public function mount(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->sorted = [];
        $this->steps = [];
        $this->comparisons = 0;
        $this->swaps = 0;
        $this->heapifyOps = 0;
        $this->timeMs = 0.0;
    }

    public function updatedInput(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->sorted = [];
        $this->steps = [];
        $this->comparisons = 0;
        $this->swaps = 0;
        $this->heapifyOps = 0;
        $this->timeMs = 0.0;
    }

    /**
     * Run heap sort and collect metrics
     */
    public function run(): void
    {
        $this->steps = [];
        $this->comparisons = 0;
        $this->swaps = 0;
        $this->heapifyOps = 0;
        $start = microtime(true);

        $result = $this->numbers;
        $this->heapSort($result);

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
     * Heap sort in-place (O(n log n))
     *
     * @param array<int> $arr (passed by reference)
     */
    private function heapSort(array &$arr): void
    {
        $n = count($arr);

        if ($n <= 1) {
            return;
        }

        $this->steps[] = '🏗️ Construindo heap máximo (maior elemento fica no topo)...';

        // Build max heap (rearrange array)
        for ($i = (int) floor($n / 2) - 1; $i >= 0; $i--) {
            $this->heapify($arr, $n, $i);
        }

        $this->steps[] = '✅ Heap máximo construído! Agora vai extrair um por um...';

        // Extract elements from heap one by one
        for ($i = $n - 1; $i > 0; $i--) {
            // Move current root (largest) to end
            $this->swap($arr, 0, $i);
            $this->swaps++;
            $this->steps[] = "📤 Extraiu o maior: {$arr[$i]} → posição {$i}";

            // Call heapify on reduced heap
            $this->heapify($arr, $i, 0);
        }
    }

    /**
     * Heapify a subtree rooted at index i
     *
     * @param array<int> $arr
     * @param int $n Size of heap
     * @param int $i Root index
     */
    private function heapify(array &$arr, int $n, int $i): void
    {
        $this->heapifyOps++;
        $largest = $i;
        $left = 2 * $i + 1;
        $right = 2 * $i + 2;

        // Check if left child is larger than root
        if ($left < $n) {
            $this->comparisons++;
            if ($arr[$left] > $arr[$largest]) {
                $largest = $left;
            }
        }

        // Check if right child is larger than current largest
        if ($right < $n) {
            $this->comparisons++;
            if ($arr[$right] > $arr[$largest]) {
                $largest = $right;
            }
        }

        // If largest is not root, swap and continue heapifying
        if ($largest !== $i) {
            $this->steps[] = "🔄 Ajustando heap: trocou {$arr[$i]} ↔ {$arr[$largest]}";
            $this->swap($arr, $i, $largest);
            $this->swaps++;

            // Recursively heapify the affected subtree
            $this->heapify($arr, $n, $largest);
        }
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
        return \view('livewire.examples.heap-sort-example');
    }
}
