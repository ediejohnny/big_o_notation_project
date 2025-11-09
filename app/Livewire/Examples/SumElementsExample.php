<?php

namespace App\Livewire\Examples;

use Livewire\Component;

class SumElementsExample extends Component
{
    public array $numbers = [10, 25, 7, 33, 18, 42, 9, 15, 28, 51];
    public ?int $sum = null;
    public ?float $average = null;
    public array $steps = [];
    public int $iterations = 0;
    public ?int $currentIndex = null;
    public ?int $runningSum = null;
    public string $status = '';
    
    /**
     * Calculate sum of all elements O(n)
     * 
     * Must visit each element exactly once to add to the total.
     */
    public function calculateSum(): void
    {
        $this->reset(['sum', 'average', 'steps', 'iterations', 'currentIndex', 'runningSum', 'status']);
        
        if (empty($this->numbers)) {
            $this->status = 'error';
            $this->steps[] = '❌ Array está vazio!';
            return;
        }
        
        $this->steps[] = "🧮 Calculando a soma de todos os elementos...";
        $this->steps[] = "📊 Array tem " . count($this->numbers) . " elementos";
        
        $this->sum = 0;
        $this->runningSum = 0;
        
        // O(n) - Must add every single element
        for ($i = 0; $i < count($this->numbers); $i++) {
            $this->iterations++;
            $this->currentIndex = $i;
            $current = $this->numbers[$i];
            
            $previousSum = $this->runningSum;
            $this->runningSum += $current;
            
            $this->steps[] = "Posição {$i}: {$previousSum} + {$current} = {$this->runningSum}";
        }
        
        $this->sum = $this->runningSum;
        $this->average = round($this->sum / count($this->numbers), 2);
        
        $this->status = 'calculated';
        $this->steps[] = "✅ Soma total: {$this->sum}";
        $this->steps[] = "📊 Média: {$this->average}";
        $this->steps[] = "🔄 Total de iterações: {$this->iterations}";
    }
    
    public function addNumber(): void
    {
        $this->numbers[] = rand(1, 100);
        $this->reset(['sum', 'average', 'steps', 'iterations', 'currentIndex', 'runningSum', 'status']);
    }
    
    public function removeNumber(int $index): void
    {
        if (isset($this->numbers[$index])) {
            array_splice($this->numbers, $index, 1);
            $this->numbers = array_values($this->numbers);
            $this->reset(['sum', 'average', 'steps', 'iterations', 'currentIndex', 'runningSum', 'status']);
        }
    }
    
    public function resetArray(): void
    {
        $this->numbers = [10, 25, 7, 33, 18, 42, 9, 15, 28, 51];
        $this->reset(['sum', 'average', 'steps', 'iterations', 'currentIndex', 'runningSum', 'status']);
    }
    
    public function render()
    {
        return view('livewire.examples.sum-elements-example');
    }
}

