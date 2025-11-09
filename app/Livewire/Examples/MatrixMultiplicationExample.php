<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * MatrixMultiplicationExample
 *
 * Demonstrates O(n³) time complexity using naive matrix multiplication.
 */
class MatrixMultiplicationExample extends Component
{
    public string $matrixA = "1,2,3\n4,5,6\n7,8,9";
    public string $matrixB = "9,8,7\n6,5,4\n3,2,1";

    /** @var array<int,array<int,int>> */
    public array $A = [];
    /** @var array<int,array<int,int>> */
    public array $B = [];
    /** @var array<int,array<int,int>> */
    public array $C = [];

    public int $multiplications = 0;
    public int $additions = 0;
    public float $timeMs = 0.0;

    /** @var array<int,string> */
    public array $steps = [];

    public function mount(): void
    {
        $this->resetFromInputs();
    }

    public function updatedMatrixA(): void
    {
        $this->resetFromInputs();
    }

    public function updatedMatrixB(): void
    {
        $this->resetFromInputs();
    }

    private function resetFromInputs(): void
    {
        $this->A = $this->parseMatrix($this->matrixA);
        $this->B = $this->parseMatrix($this->matrixB);
        $this->C = [];
        $this->multiplications = 0;
        $this->additions = 0;
        $this->timeMs = 0.0;
        $this->steps = [];
    }

    /**
     * Parse a matrix from user input (rows separated by newlines, values by commas)
     * @return array<int,array<int,int>>
     */
    private function parseMatrix(string $raw): array
    {
        $rows = preg_split("/\r?\n/", trim($raw ?? ''));
        if ($rows === false) {
            return [];
        }

        $matrix = [];
        foreach ($rows as $row) {
            $parts = preg_split('/\s*,\s*/', trim($row));
            if ($parts === false) {
                continue;
            }

            $line = [];
            foreach ($parts as $p) {
                if ($p === '') {
                    continue;
                }

                $line[] = (int) $p;
            }

            if (count($line) > 0) {
                $matrix[] = $line;
            }
        }

        return $matrix;
    }

    /** Run matrix multiplication and collect metrics */
    public function run(): void
    {
        $this->steps = [];
        $this->multiplications = 0;
        $this->additions = 0;
        $this->C = [];

        $start = microtime(true);

        $n = count($this->A);
        if ($n === 0) {
            $this->steps[] = 'Matriz A está vazia.';
            $this->timeMs = (microtime(true) - $start) * 1000.0;
            return;
        }

        $colsA = count($this->A[0] ?? []);
        $rowsB = count($this->B);
        $colsB = count($this->B[0] ?? []);

        if ($colsA !== $rowsB) {
            $this->steps[] = "Dimensões incompatíveis: A é {$n}x{$colsA}, B é {$rowsB}x{$colsB}. Precisa colsA == rowsB.";
            $this->timeMs = (microtime(true) - $start) * 1000.0;
            return;
        }

        // Initialize C with zeros
        for ($i = 0; $i < $n; $i++) {
            $this->C[$i] = array_fill(0, $colsB, 0);
        }

        $this->steps[] = 'Iniciando multiplicação ingênua (três loops)...';

        for ($i = 0; $i < $n; $i++) {
            for ($j = 0; $j < $colsB; $j++) {
                $sum = 0;
                for ($k = 0; $k < $colsA; $k++) {
                    $prod = $this->A[$i][$k] * $this->B[$k][$j];
                    $this->multiplications++;
                    $sum += $prod;
                    $this->additions++;
                    $this->steps[] = 'C[' . $i . '][' . $j . '] += A[' . $i . '][' . $k . '] * B[' . $k . '][' . $j . '] = ' . $this->A[$i][$k] . ' * ' . $this->B[$k][$j] . ' = ' . $prod . ' (soma parcial ' . $sum . ')';
                }
                $this->C[$i][$j] = $sum;
            }
        }

        $this->timeMs = (microtime(true) - $start) * 1000.0;
        $this->steps[] = '✅ Concluído!';
    }

    public function render()
    {
        return view('livewire.examples.matrix-multiplication-example');
    }
}
