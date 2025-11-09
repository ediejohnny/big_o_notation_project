<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * BubbleSortExample
 *
 * Demonstrates O(n²) time complexity using Bubble Sort.
 * Users can edit the input array, run the algorithm, and see steps and metrics.
 */
class BubbleSortExample extends Component
{
    public string $input = '64,34,25,12,22,11,90';
    public array $numbers = [];
    public array $sorted = [];

    // Metrics
    public int $comparisons = 0;
    public int $swaps = 0;
    public int $passes = 0; // number of full passes through the array
    public float $timeMs = 0.0;

    public array $steps = [];

    public function mount(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->sorted = [];
        $this->steps = [];
        $this->comparisons = 0;
        $this->swaps = 0;
        $this->passes = 0;
        $this->timeMs = 0.0;
    }

    public function updatedInput(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->sorted = [];
        $this->steps = [];
        $this->comparisons = 0;
        $this->swaps = 0;
        $this->passes = 0;
        $this->timeMs = 0.0;
    }

    /**
     * Run bubble sort and collect metrics
     */
    public function run(): void
    {
        $this->steps = [];
        $this->comparisons = 0;
        $this->swaps = 0;
        $this->passes = 0;
        $start = microtime(true);

        $result = $this->numbers;
        $this->bubbleSort($result);

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
     * Bubble sort implementation (O(n²))
     *
     * @param array<int> $arr (passed by reference)
     */
    private function bubbleSort(array &$arr): void
    {
        $n = count($arr);

        if ($n <= 1) {
            return;
        }

        $this->steps[] = "🫧 Iniciando Bubble Sort com {$n} elementos";

        // Outer loop: each pass
        for ($i = 0; $i < $n - 1; $i++) {
            $this->passes++;
            $swappedThisPass = false;
            $this->steps[] = "--- Passada #{$this->passes} ---";

            // Inner loop: compare adjacent elements
            for ($j = 0; $j < $n - $i - 1; $j++) {
                $this->comparisons++;
                $this->steps[] = "Compara {$arr[$j]} com {$arr[$j + 1]}";

                if ($arr[$j] > $arr[$j + 1]) {
                    // Swap
                    $this->swap($arr, $j, $j + 1);
                    $this->swaps++;
                    $swappedThisPass = true;
                    $this->steps[] = "→ Troca! {$arr[$j]} ↔ {$arr[$j + 1]} | Array agora: [" . implode(', ', $arr) . "]";
                }
            }

            // Optimization: if no swaps happened, array is sorted
            if (!$swappedThisPass) {
                $this->steps[] = "✓ Nenhuma troca nesta passada — array está ordenado!";
                break;
            }

            $this->steps[] = "Fim da passada #{$this->passes}: [" . implode(', ', $arr) . "]";
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
        return view('livewire.examples.bubble-sort-example');
    }
}
