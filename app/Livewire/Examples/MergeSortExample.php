<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * MergeSortExample
 *
 * Demonstrates O(n log n) time complexity using Merge Sort.
 * Users can edit the input array, run the algorithm, and see steps and metrics.
 */
class MergeSortExample extends Component
{
    public string $input = '5,3,8,4,2,7,1,6';
    public array $numbers = [];
    public array $sorted = [];

    // Metrics
    public int $comparisons = 0;
    public int $moves = 0; // number of element moves into temp arrays
    public float $timeMs = 0.0;

    public array $steps = [];

    public function mount(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->sorted = [];
        $this->steps = [];
        $this->comparisons = 0;
        $this->moves = 0;
        $this->timeMs = 0.0;
    }

    public function updatedInput(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->sorted = [];
        $this->steps = [];
        $this->comparisons = 0;
        $this->moves = 0;
        $this->timeMs = 0.0;
    }

    /**
     * Run merge sort and collect metrics
     */
    public function run(): void
    {
        $this->steps = [];
        $this->comparisons = 0;
        $this->moves = 0;
        $start = microtime(true);

        $result = $this->mergeSort($this->numbers);

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
     * Merge sort implementation (O(n log n))
     *
     * @param array<int> $arr
     * @return array<int>
     */
    private function mergeSort(array $arr): array
    {
        // Base case: arrays of size 0 or 1 are already sorted
        if (count($arr) <= 1) {
            return $arr;
        }

        $mid = (int) floor(count($arr) / 2);
        $left = array_slice($arr, 0, $mid);
        $right = array_slice($arr, $mid);
        $this->steps[] = '📦 Dividindo em duas partes: [' . implode(', ', $left) . '] | [' . implode(', ', $right) . ']';

        // Recursively sort both halves
        $sortedLeft = $this->mergeSort($left);
        $sortedRight = $this->mergeSort($right);

        // Merge the sorted halves
        $merged = $this->merge($sortedLeft, $sortedRight);
        $this->steps[] = '✅ Juntou ordenado: [' . implode(', ', $merged) . ']';

        return $merged;
    }

    /**
     * Merge two sorted arrays into one sorted array
     *
     * @param array<int> $left
     * @param array<int> $right
     * @return array<int>
     */
    private function merge(array $left, array $right): array
    {
        $result = [];
        $i = 0;
        $j = 0;

        while ($i < count($left) && $j < count($right)) {
            $this->comparisons++;
            $this->steps[] = "🔍 Comparando {$left[$i]} com {$right[$j]}";

            if ($left[$i] <= $right[$j]) {
                $result[] = $left[$i];
                $i++;
                $this->moves++;
                $this->steps[] = '→ Pegou da esquerda (é menor)';
                continue;
            }

            // right is smaller
            $result[] = $right[$j];
            $j++;
            $this->moves++;
            $this->steps[] = '→ Pegou da direita (é menor)';
        }

        // Append remaining items from left
        while ($i < count($left)) {
            $result[] = $left[$i];
            $i++;
            $this->moves++;
        }

        // Append remaining items from right
        while ($j < count($right)) {
            $result[] = $right[$j];
            $j++;
            $this->moves++;
        }

        return $result;
    }

    public function render()
    {
        return \view('livewire.examples.merge-sort-example');
    }
}
