<?php

namespace App\Livewire\Examples;

use Livewire\Component;

class LinearSearchExample extends Component
{
    public array $numbers = [15, 3, 42, 8, 23, 16, 4, 91, 7, 55];
    public int $target = 23;
    public ?int $foundIndex = null;
    public array $steps = [];
    public int $comparisons = 0;
    public ?int $currentIndex = null;
    public string $status = '';
    
    /**
     * Execute linear search O(n)
     * 
     * Must check each element sequentially until finding the target
     * or reaching the end of the array.
     */
    public function search(): void
    {
        $this->reset(['foundIndex', 'steps', 'comparisons', 'currentIndex', 'status']);
        
        if (empty($this->numbers)) {
            $this->status = 'error';
            $this->steps[] = '❌ Array está vazio!';
            return;
        }
        
        $this->steps[] = "🔍 Procurando o valor {$this->target} no array...";
        $this->steps[] = "📊 Array tem " . count($this->numbers) . " elementos";
        
        // O(n) - Linear search through all elements
        for ($i = 0; $i < count($this->numbers); $i++) {
            $this->comparisons++;
            $this->currentIndex = $i;
            $this->steps[] = "Posição {$i}: Verificando {$this->numbers[$i]} == {$this->target}?";
            
            if ($this->numbers[$i] === $this->target) {
                $this->foundIndex = $i;
                $this->status = 'found';
                $this->steps[] = "✅ Encontrado na posição {$i}!";
                $this->steps[] = "📈 Total de comparações: {$this->comparisons}";
                return;
            }
            
            $this->steps[] = "   ❌ Não, continue...";
        }
        
        $this->status = 'not-found';
        $this->steps[] = "❌ Valor {$this->target} não encontrado no array";
        $this->steps[] = "📈 Total de comparações: {$this->comparisons}";
    }
    
    public function addNumber(): void
    {
        $this->numbers[] = rand(1, 100);
        $this->reset(['foundIndex', 'steps', 'comparisons', 'currentIndex', 'status']);
    }
    
    public function removeNumber(int $index): void
    {
        if (isset($this->numbers[$index])) {
            array_splice($this->numbers, $index, 1);
            $this->numbers = array_values($this->numbers);
            $this->reset(['foundIndex', 'steps', 'comparisons', 'currentIndex', 'status']);
        }
    }
    
    public function resetArray(): void
    {
        $this->numbers = [15, 3, 42, 8, 23, 16, 4, 91, 7, 55];
        $this->target = 23;
        $this->reset(['foundIndex', 'steps', 'comparisons', 'currentIndex', 'status']);
    }
    
    public function render()
    {
        return view('livewire.examples.linear-search-example');
    }
}

