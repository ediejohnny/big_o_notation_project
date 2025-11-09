<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * ThreeSumBruteForceExample
 *
 * Demonstrates O(n³) time complexity by checking all triplets.
 */
class ThreeSumBruteForceExample extends Component
{
    public string $input = '2,7,11,15,3,6,4';
    public int $target = 20;

    /** @var array<int> */
    public array $numbers = [];

    /** @var array<int>|null */
    public ?array $result = null; // [a,b,c]

    // Metrics
    public int $combinations = 0; // number of triplets tested
    public int $additions = 0;    // number of additions executed
    public float $timeMs = 0.0;

    /** @var array<int,string> */
    public array $steps = [];

    public function mount(): void
    {
        $this->resetStateFromInput();
    }

    public function updatedInput(): void
    {
        $this->resetStateFromInput();
    }

    public function updatedTarget(): void
    {
        $this->result = null;
        $this->steps = [];
        $this->combinations = 0;
        $this->additions = 0;
        $this->timeMs = 0.0;
    }

    private function resetStateFromInput(): void
    {
        $this->numbers = $this->parseInput($this->input);
        $this->result = null;
        $this->steps = [];
        $this->combinations = 0;
        $this->additions = 0;
        $this->timeMs = 0.0;
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
     * Run the brute force search for Three Sum
     */
    public function run(): void
    {
        $this->steps = [];
        $this->combinations = 0;
        $this->additions = 0;

        $start = microtime(true);
        $n = count($this->numbers);

        if ($n < 3) {
            $this->steps[] = 'O array precisa ter pelo menos 3 elementos.';
            $this->timeMs = (microtime(true) - $start) * 1000.0;
            return;
        }

        $this->steps[] = "Procurando três números que somam {$this->target} (força bruta)";

        for ($i = 0; $i < $n - 2; $i++) {
            for ($j = $i + 1; $j < $n - 1; $j++) {
                for ($k = $j + 1; $k < $n; $k++) {
                    $this->combinations++;
                    $sum = $this->numbers[$i] + $this->numbers[$j] + $this->numbers[$k];
                    $this->additions += 2; // two additions to make the sum
                    $this->steps[] = "Teste #{$this->combinations}: {$this->numbers[$i]} + {$this->numbers[$j]} + {$this->numbers[$k]} = {$sum}";

                    if ($sum === $this->target) {
                        $this->result = [
                            $this->numbers[$i],
                            $this->numbers[$j],
                            $this->numbers[$k],
                        ];
                        $this->steps[] = '✅ Encontrado!';
                        $this->timeMs = (microtime(true) - $start) * 1000.0;
                        return;
                    }

                    $this->steps[] = '→ Não bateu o alvo, seguindo...';
                }
            }
        }

        $this->steps[] = '❌ Nenhuma combinação encontrada.';
        $this->timeMs = (microtime(true) - $start) * 1000.0;
    }

    public function render()
    {
        return view('livewire.examples.three-sum-brute-force-example');
    }
}
