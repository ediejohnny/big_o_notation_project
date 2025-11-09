<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * TowerOfHanoiExample
 * Demonstrates O(2^n) moves to solve Tower of Hanoi.
 */
class TowerOfHanoiExample extends Component
{
    public int $disks = 4;
    /** @var array<int,string> */
    public array $moves = [];
    public int $moveCount = 0;
    public float $timeMs = 0.0;
    public ?string $errorMessage = null;

    // Maximum safe value to prevent exponential explosion
    private const MAX_SAFE_DISKS = 25;

    public function run(): void
    {
        $this->moves = [];
        $this->moveCount = 0;
        $this->errorMessage = null;

        // Validate input to prevent exponential explosion
        if ($this->disks > self::MAX_SAFE_DISKS) {
            $this->errorMessage = "⚠️ ATENÇÃO: Mais de " . self::MAX_SAFE_DISKS . " discos causam explosão exponencial! Com n=" . $this->disks . ", seriam 2^" . $this->disks . " - 1 = " . number_format(pow(2, $this->disks) - 1, 0, ',', '.') . " movimentos. Use no máximo " . self::MAX_SAFE_DISKS . " discos. Para referência: 64 discos levariam 585 bilhões de anos para resolver (movendo 1 disco por segundo)!";
            return;
        }

        if ($this->disks < 1) {
            $this->errorMessage = "❌ Número de discos deve ser pelo menos 1.";
            return;
        }

        $start = microtime(true);

        $this->solve($this->disks, 'A', 'C', 'B');

        $this->timeMs = (microtime(true) - $start) * 1000.0;
    }

    private function solve(int $n, string $from, string $to, string $aux): void
    {
        if ($n === 0) {
            return;
        }

        $this->solve($n - 1, $from, $aux, $to);
        $this->moves[] = 'Mover disco ' . $n . ' de ' . $from . ' para ' . $to;
        $this->moveCount++;
        $this->solve($n - 1, $aux, $to, $from);
    }

    public function render()
    {
        return view('livewire.examples.tower-of-hanoi-example');
    }
}
