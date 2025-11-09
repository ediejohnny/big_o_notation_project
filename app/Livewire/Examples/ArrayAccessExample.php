<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * Array Access Example - O(1) Constant Time Complexity
 * 
 * Demonstrates accessing an array element by index, which is always O(1)
 * regardless of array size.
 */
class ArrayAccessExample extends Component
{
    public array $numbers = [10, 25, 33, 47, 52, 68, 71, 89, 95, 100];
    public $index = 0;  // Removendo tipagem para aceitar string do input
    public ?int $result = null;
    public array $steps = [];
    public int $operations = 0;
    
    public function mount(): void
    {
        $this->accessByIndex();
    }
    
    /**
     * Called when index property is updated
     */
    public function updated($propertyName): void
    {
        if ($propertyName === 'index') {
            $this->accessByIndex();
        }
    }
    
    /**
     * Access array element by index - O(1)
     * 
     * Direct memory access using index calculation.
     * Time complexity does NOT depend on array size.
     */
    public function accessByIndex(): void
    {
        $this->steps = [];
        $this->operations = 0;
        
        // Convert to integer
        $indexInt = (int) $this->index;
        
        // Validate index
        if ($indexInt < 0 || $indexInt >= count($this->numbers)) {
            $this->steps[] = "❌ Índice {$indexInt} está fora do intervalo válido [0, " . (count($this->numbers) - 1) . "]";
            $this->result = null;
            return;
        }
        
        $this->steps[] = "📍 Acessando posição {$indexInt} do array...";
        $this->operations++;
        
        // O(1) operation - direct memory access
        $this->result = $this->numbers[$indexInt];
        
        $this->steps[] = "✅ Valor encontrado: {$this->result}";
        $this->steps[] = "⚡ Operações realizadas: {$this->operations}";
        $this->steps[] = "🎯 Complexidade: O(1) - Tempo constante!";
    }
    
    public function render()
    {
        return view('livewire.examples.array-access-example');
    }
}
