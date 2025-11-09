<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * TwoSumBruteForceExample
 *
 * Demonstrates O(n²) time complexity using brute force approach to Two Sum problem.
 * Users can edit the input array and target, run the algorithm, and see steps and metrics.
 */
class TwoSumBruteForceExample extends Component
{
    public string $input = '2,7,11,15,3';
    public int $target = 9;
    public array $numbers = [];
    public ?array $result = null;

    // Metrics
    public int $comparisons = 0;
    public int $additions = 0; // number of additions performed
    public float $timeMs = 0.0;

    public array $steps = [];

    public function mount(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->result = null;
        $this->steps = [];
        $this->comparisons = 0;
        $this->additions = 0;
        $this->timeMs = 0.0;
    }

    public function updatedInput(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->result = null;
        $this->steps = [];
        $this->comparisons = 0;
        $this->additions = 0;
        $this->timeMs = 0.0;
    }

    public function updatedTarget(): void
    {
        $this->result = null;
        $this->steps = [];
        $this->comparisons = 0;
        $this->additions = 0;
        $this->timeMs = 0.0;
    }

    /**
     * Run two sum brute force and collect metrics
     */
    public function run(): void
    {
        $this->steps = [];
        $this->comparisons = 0;
        $this->additions = 0;
        $start = microtime(true);

        $this->result = $this->twoSumBruteForce($this->numbers, $this->target);

        $elapsed = microtime(true) - $start;
        $this->timeMs = $elapsed * 1000.0;

        if ($this->result === null) {
            $this->steps[] = "❌ Não encontrou dois números que somam {$this->target}";
        }
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
     * Two Sum brute force implementation (O(n²))
     *
     * @param array<int> $nums
     * @param int $target
     * @return array<int>|null Array with two numbers that sum to target, or null if not found
     */
    private function twoSumBruteForce(array $nums, int $target): ?array
    {
        $n = count($nums);

        if ($n < 2) {
            $this->steps[] = "Array precisa ter pelo menos 2 elementos!";
            return null;
        }

        $this->steps[] = "🔍 Procurando dois números que somam {$target}";
        $this->steps[] = "Usando força bruta — testando TODAS as combinações possíveis...";

        // Outer loop: pick first number
        for ($i = 0; $i < $n - 1; $i++) {
            $this->steps[] = "--- Testando {$nums[$i]} (índice {$i}) com todos os seguintes ---";

            // Inner loop: pick second number
            for ($j = $i + 1; $j < $n; $j++) {
                $this->comparisons++;
                $this->additions++;
                $sum = $nums[$i] + $nums[$j];

                $this->steps[] = "{$nums[$i]} + {$nums[$j]} = {$sum}";

                if ($sum === $target) {
                    $this->steps[] = "✅ ENCONTROU! {$nums[$i]} + {$nums[$j]} = {$target}";
                    $this->steps[] = "Total de combinações testadas: {$this->comparisons}";
                    return [$nums[$i], $nums[$j]];
                }

                $this->steps[] = "→ {$sum} ≠ {$target}, continua procurando...";
            }
        }

        $this->steps[] = "Total de combinações testadas: {$this->comparisons}";
        return null;
    }

    public function render()
    {
        return view('livewire.examples.two-sum-brute-force-example');
    }
}
