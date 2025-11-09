<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * TowerOfHanoiExample
 * Demonstrates O(2^n) moves to solve Tower of Hanoi.
 */
class TowerOfHanoiExample extends Component
{
    public int $disks = 4; // keep small for demo
    /** @var array<int,string> */
    public array $moves = [];
    public int $moveCount = 0;
    public float $timeMs = 0.0;

    public function run(): void
    {
        $this->moves = [];
        $this->moveCount = 0;
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
