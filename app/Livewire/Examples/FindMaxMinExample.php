<?php

namespace App\Livewire\Examples;

use Livewire\Component;

class FindMaxMinExample extends Component
{
    public array $numbers = [42, 15, 88, 3, 67, 21, 94, 56, 12, 73];
    public ?int $maxValue = null;
    public ?int $minValue = null;
    public ?int $maxIndex = null;
    public ?int $minIndex = null;
    public array $steps = [];
    public int $comparisons = 0;
    public ?int $currentIndex = null;
    public string $status = '';
    
    /**
     * Find maximum and minimum values O(n)
     * 
     * Must iterate through all elements to ensure we found
     * the true maximum and minimum values.
     */
    public function findMaxMin(): void
    {
        $this->reset(['maxValue', 'minValue', 'maxIndex', 'minIndex', 'steps', 'comparisons', 'currentIndex', 'status']);
        
        if (empty($this->numbers)) {
            $this->status = 'error';
            $this->steps[] = '❌ Array está vazio!';
            return;
        }
        
        $this->steps[] = "🔍 Procurando o maior e menor valor...";
        $this->steps[] = "📊 Array tem " . count($this->numbers) . " elementos";
        
        // Initialize with first element
        $this->maxValue = $this->numbers[0];
        $this->minValue = $this->numbers[0];
        $this->maxIndex = 0;
        $this->minIndex = 0;
        
        $this->steps[] = "Inicializando: max = {$this->maxValue}, min = {$this->minValue}";
        
        // O(n) - Must check every element
        for ($i = 1; $i < count($this->numbers); $i++) {
            $this->currentIndex = $i;
            $current = $this->numbers[$i];
            
            $this->steps[] = "Posição {$i}: Verificando {$current}";
            
            if ($current > $this->maxValue) {
                $this->comparisons++;
                $this->steps[] = "   ✅ {$current} > {$this->maxValue} - Novo MÁXIMO!";
                $this->maxValue = $current;
                $this->maxIndex = $i;
            }
            
            if ($current < $this->minValue) {
                $this->comparisons++;
                $this->steps[] = "   ✅ {$current} < {$this->minValue} - Novo MÍNIMO!";
                $this->minValue = $current;
                $this->minIndex = $i;
            }
            
            $this->comparisons += 2; // Two comparisons per iteration
        }
        
        $this->status = 'found';
        $this->steps[] = "✅ Resultado: Máximo = {$this->maxValue} (posição {$this->maxIndex})";
        $this->steps[] = "✅ Resultado: Mínimo = {$this->minValue} (posição {$this->minIndex})";
        $this->steps[] = "📈 Total de comparações: {$this->comparisons}";
    }
    
    public function addNumber(): void
    {
        $this->numbers[] = rand(1, 100);
        $this->reset(['maxValue', 'minValue', 'maxIndex', 'minIndex', 'steps', 'comparisons', 'currentIndex', 'status']);
    }
    
    public function removeNumber(int $index): void
    {
        if (isset($this->numbers[$index])) {
            array_splice($this->numbers, $index, 1);
            $this->numbers = array_values($this->numbers);
            $this->reset(['maxValue', 'minValue', 'maxIndex', 'minIndex', 'steps', 'comparisons', 'currentIndex', 'status']);
        }
    }
    
    public function resetArray(): void
    {
        $this->numbers = [42, 15, 88, 3, 67, 21, 94, 56, 12, 73];
        $this->reset(['maxValue', 'minValue', 'maxIndex', 'minIndex', 'steps', 'comparisons', 'currentIndex', 'status']);
    }
    
    public function render()
    {
        return view('livewire.examples.find-max-min-example');
    }
}

