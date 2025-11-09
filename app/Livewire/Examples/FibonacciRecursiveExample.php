<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * FibonacciRecursiveExample
 *
 * Demonstrates exponential time O(2^n) using naive recursive Fibonacci.
 */
class FibonacciRecursiveExample extends Component
{
    public int $n = 10;
    public ?int $result = null;
    public int $calls = 0;
    public float $timeMs = 0.0;
    /** @var array<int,string> */
    public array $steps = [];

    public function mount(): void
    {
        $this->result = null;
        $this->calls = 0;
        $this->timeMs = 0.0;
        $this->steps = [];
    }

    public function run(): void
    {
        $this->result = null;
        $this->calls = 0;
        $this->steps = [];

        $start = microtime(true);
        $this->result = $this->fib($this->n);
        $this->timeMs = (microtime(true) - $start) * 1000.0;
    }

    private function fib(int $x): int
    {
        $this->calls++;
        $this->steps[] = 'fib(' . $x . ') called';

        if ($x <= 1) {
            return $x;
        }

        $a = $this->fib($x - 1);
        $b = $this->fib($x - 2);
        return $a + $b;
    }

    public function render()
    {
        return view('livewire.examples.fibonacci-recursive-example');
    }
}
