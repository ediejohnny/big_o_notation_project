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
    public ?string $errorMessage = null;

    // Maximum safe value to prevent stack overflow
    private const MAX_SAFE_N = 35;

    public function mount(): void
    {
        $this->result = null;
        $this->calls = 0;
        $this->timeMs = 0.0;
        $this->steps = [];
        $this->errorMessage = null;
    }

    public function run(): void
    {
        $this->result = null;
        $this->calls = 0;
        $this->steps = [];
        $this->errorMessage = null;

        // Validate input to prevent stack overflow
        if ($this->n > self::MAX_SAFE_N) {
            $this->errorMessage = "⚠️ ATENÇÃO: Valores acima de " . self::MAX_SAFE_N . " causam estouro de pilha (stack overflow) devido à explosão exponencial de chamadas recursivas! Com n=" . $this->n . ", seriam aproximadamente 2^" . $this->n . " = " . number_format(pow(2, $this->n), 0, ',', '.') . " operações. Use no máximo " . self::MAX_SAFE_N . " para ver o algoritmo funcionar de forma segura. Para valores maiores, seria necessário usar programação dinâmica (memoization).";
            return;
        }

        if ($this->n < 0) {
            $this->errorMessage = "❌ N deve ser um número positivo.";
            return;
        }

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
