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
    public ?string $errorMessage = null;

    // Maximum safe value to prevent memory exhaustion
    private const MAX_SAFE_ITEMS = 20;

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
        $this->errorMessage = null;
    }

    public function run(): void
    {
        $this->subsets = [];
        $this->steps = [];
        $this->errorMessage = null;

        $n = count($this->items);

        // Validate input to prevent memory exhaustion
        if ($n > self::MAX_SAFE_ITEMS) {
            $this->errorMessage = "⚠️ ATENÇÃO: Mais de " . self::MAX_SAFE_ITEMS . " itens causam esgotamento de memória! Com n=" . $n . ", seriam 2^" . $n . " = " . number_format(pow(2, $n), 0, ',', '.') . " subconjuntos. Use no máximo " . self::MAX_SAFE_ITEMS . " itens para evitar travamento do navegador.";
            return;
        }

        if ($n === 0) {
            $this->errorMessage = "❌ Digite pelo menos um item separado por vírgula.";
            return;
        }

        $start = microtime(true);
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
