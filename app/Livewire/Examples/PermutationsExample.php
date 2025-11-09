<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * PermutationsExample
 *
 * Generates all permutations (arrangements) of a set of items.
 * Demonstrates O(n!) factorial time complexity.
 */
class PermutationsExample extends Component
{
    public string $itemsInput = "A,B,C";
    /** @var array<int,string> */
    public array $items = [];
    /** @var array<int,array<int,string>> */
    public array $permutations = [];
    public int $permutationCount = 0;
    public float $timeMs = 0.0;
    public ?string $errorMessage = null;

    // Maximum safe value to prevent factorial explosion
    private const MAX_SAFE_ITEMS = 10;

    public function mount(): void
    {
        $this->parseItems();
    }

    public function updatedItemsInput(): void
    {
        $this->parseItems();
    }

    private function parseItems(): void
    {
        $parts = preg_split('/\s*,\s*/', trim($this->itemsInput ?? ''));
        if ($parts === false) {
            $this->items = [];
            return;
        }

        $this->items = array_values(array_filter($parts, fn($p) => $p !== ''));
        $this->permutations = [];
        $this->permutationCount = 0;
        $this->timeMs = 0.0;
        $this->errorMessage = null;
    }

    public function run(): void
    {
        $this->permutations = [];
        $this->errorMessage = null;

        $n = count($this->items);

        // Validate input to prevent factorial explosion
        if ($n > self::MAX_SAFE_ITEMS) {
            $factorial = $this->calculateFactorial($n);
            $this->errorMessage = "⚠️ ATENÇÃO: Mais de " . self::MAX_SAFE_ITEMS . " itens causam explosão fatorial! Com n=" . $n . ", seriam " . $n . "! = " . number_format($factorial, 0, ',', '.') . " permutações. Use no máximo " . self::MAX_SAFE_ITEMS . " itens. Para referência: 20 itens geram 2,4 quintilhões de permutações!";
            return;
        }

        if ($n === 0) {
            $this->errorMessage = "❌ Digite pelo menos um item separado por vírgula.";
            return;
        }

        $start = microtime(true);

        $this->permutations = $this->generatePermutations($this->items);
        $this->permutationCount = count($this->permutations);

        $this->timeMs = (microtime(true) - $start) * 1000.0;
    }

    /**
     * Generate all permutations using recursive backtracking
     * 
     * @param array<int,string> $items
     * @param array<int,string> $current
     * @return array<int,array<int,string>>
     */
    private function generatePermutations(array $items, array $current = []): array
    {
        if (count($items) === 0) {
            return [$current];
        }

        $result = [];
        foreach ($items as $i => $item) {
            $remaining = $items;
            unset($remaining[$i]);
            $remaining = array_values($remaining);
            
            $newCurrent = $current;
            $newCurrent[] = $item;
            
            $subPermutations = $this->generatePermutations($remaining, $newCurrent);
            $result = array_merge($result, $subPermutations);
        }

        return $result;
    }

    private function calculateFactorial(int $n): float
    {
        if ($n <= 1) {
            return 1;
        }

        $result = 1.0;
        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }

    public function render()
    {
        return view('livewire.examples.permutations-example');
    }
}
