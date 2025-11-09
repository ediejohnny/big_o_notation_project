<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * PowerSetExample
 *
 * Generates all subsets (power set) of a given set. O(2^n) subsets.
 */
class PowerSetExample extends Component
{
    public string $itemsInput = "a,b,c";
    /** @var array<int,string> */
    public array $items = [];
    /** @var array<int,array<int,string>> */
    public array $subsets = [];
    public int $subsetCount = 0;
    public float $timeMs = 0.0;

    /** @var array<int,string> */
    public array $steps = [];

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
        $this->subsets = [];
        $this->subsetCount = 0;
        $this->timeMs = 0.0;
        $this->steps = [];
    }

    public function run(): void
    {
        $this->subsets = [];
        $this->steps = [];
        $start = microtime(true);

        $n = count($this->items);
        $total = 1 << $n; // 2^n
        for ($mask = 0; $mask < $total; $mask++) {
            $subset = [];
            for ($i = 0; $i < $n; $i++) {
                $bit = ($mask >> $i) & 1;
                if ($bit === 1) {
                    $subset[] = $this->items[$i];
                }
            }
            $this->subsets[] = $subset;
            if ($mask < 128) {
                $this->steps[] = 'mask ' . $mask . ' -> [' . implode(',', $subset) . ']';
            }
        }

        $this->subsetCount = count($this->subsets);
        $this->timeMs = (microtime(true) - $start) * 1000.0;
    }

    public function render()
    {
        return view('livewire.examples.power-set-example');
    }
}
