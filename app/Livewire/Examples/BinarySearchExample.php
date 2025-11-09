<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * Binary Search Example - O(log n) Logarithmic Time Complexity
 * 
 * Demonstrates binary search algorithm that "cuts the problem in half"
 * at each step, making it incredibly efficient even with large datasets.
 */
class BinarySearchExample extends Component
{
    public array $numbers = [5, 12, 18, 23, 31, 45, 52, 67, 73, 81, 89, 94];
    public $target = 67;
    public ?int $foundIndex = null;
    public array $steps = [];
    public int $comparisons = 0;
    public array $currentRange = [];
    public ?int $currentMiddle = null;
    public bool $searching = false;
    public string $status = '';
    
    // For array management
    public int|string $newNumber = '';
    public string $addError = '';
    public ?int $selectedForDeletion = null;
    
    public function mount(): void
    {
        $this->search();
    }
    
    /**
     * Called when target changes
     */
    public function updated($propertyName): void
    {
        if ($propertyName === 'target') {
            $this->search();
        }
    }
    
    /**
     * Binary Search - O(log n)
     * 
     * Searches for a value by repeatedly dividing the search space in half.
     * Only works on SORTED arrays!
     */
    public function search(): void
    {
        $this->reset(['steps', 'comparisons', 'foundIndex', 'currentRange', 'currentMiddle', 'status']);
        
        // Validate target is a number
        if (!is_numeric($this->target)) {
            $this->status = 'error';
            $this->steps[] = "❌ Por favor, digite um número válido!";
            return;
        }

        if (count($this->numbers) === 0) {
            $this->status = 'error';
            $this->steps[] = "❌ Array está vazio! Adicione números primeiro.";
            return;
        }
        
        $targetInt = (int) $this->target;
        $left = 0;
        $right = count($this->numbers) - 1;
        
        $this->steps[] = "🎯 Procurando por: {$targetInt}";
        $this->steps[] = "📊 Array tem " . count($this->numbers) . " elementos (índices 0 a {$right})";
        $this->steps[] = "";
        
        while ($left <= $right) {
            $this->comparisons++;
            $middle = (int) floor(($left + $right) / 2);
            $this->currentMiddle = $middle;
            $this->currentRange = [$left, $right];
            
            $this->steps[] = "🔍 Passo {$this->comparisons}:";
            $this->steps[] = "   Intervalo: [{$left} ... {$right}] (tamanho: " . ($right - $left + 1) . ")";
            $this->steps[] = "   Meio = ({$left} + {$right}) ÷ 2 = {$middle}";
            $this->steps[] = "   Valor no meio: {$this->numbers[$middle]}";
            
            // Found!
            if ($this->numbers[$middle] === $targetInt) {
                $this->foundIndex = $middle;
                $this->status = 'found';
                $this->steps[] = "   ✅ ENCONTRADO! {$targetInt} está no índice {$middle}";
                $this->steps[] = "";
                $this->steps[] = "📈 Total de comparações: {$this->comparisons}";
                $this->steps[] = "⚡ Complexidade: O(log n) - Logarítmica!";
                return;
            }
            
            // Target is smaller - search left half
            if ($this->numbers[$middle] > $targetInt) {
                $this->steps[] = "   ⬅️ {$this->numbers[$middle]} > {$targetInt} → Buscar na METADE ESQUERDA";
                $right = $middle - 1;
            } 
            // Target is larger - search right half  
            if ($this->numbers[$middle] < $targetInt) {
                $this->steps[] = "   ➡️ {$this->numbers[$middle]} < {$targetInt} → Buscar na METADE DIREITA";
                $left = $middle + 1;
            }
            
            $this->steps[] = "";
        }
        
        // Not found
        $this->status = 'not-found';
        $this->steps[] = "❌ Valor {$targetInt} NÃO está no array";
        $this->steps[] = "📈 Total de comparações: {$this->comparisons}";
        $this->steps[] = "⚡ Complexidade: O(log n) - Logarítmica!";
    }

    /**
     * Add a new number to the array (auto-sorts after adding)
     */
    public function addNumber(): void
    {
        $this->addError = '';
        
        if (!is_numeric($this->newNumber)) {
            $this->addError = '❌ Digite um número válido';
            return;
        }

        $number = (int) $this->newNumber;

        if (in_array($number, $this->numbers)) {
            $this->addError = "❌ O número {$number} já existe no array (sem duplicatas permitidas)";
            return;
        }

        $this->numbers[] = $number;
        sort($this->numbers);
        $this->newNumber = '';
        $this->search(); // Re-run search with updated array
    }

    /**
     * Remove a number from the array by index
     */
    public function removeNumber(int $index): void
    {
        if (!isset($this->numbers[$index])) {
            return;
        }

        array_splice($this->numbers, $index, 1);
        $this->numbers = array_values($this->numbers);
        $this->selectedForDeletion = null;
        $this->search(); // Re-run search with updated array
    }

    /**
     * Toggle selection for deletion (mobile-friendly)
     * First tap: search for the number
     * Second tap: show delete button
     */
    public function toggleSelection(int $index): void
    {
        if (!isset($this->numbers[$index])) {
            return;
        }

        // If this number is already selected for deletion, deselect it
        if ($this->selectedForDeletion === $index) {
            $this->selectedForDeletion = null;
            return;
        }

        // If another number was selected, or none was selected:
        // First action: search for this number
        if ($this->selectedForDeletion !== $index) {
            $this->target = $this->numbers[$index];
            // Second tap on same number will show delete button
            $this->selectedForDeletion = $index;
        }
    }

    /**
     * Select a number from the array to search for it
     */
    public function selectNumber(int $index): void
    {
        if (!isset($this->numbers[$index])) {
            return;
        }

        $this->target = $this->numbers[$index];
        $this->selectedForDeletion = null;
    }

    /**
     * Reset array to default values
     */
    public function resetArray(): void
    {
        $this->numbers = [5, 12, 18, 23, 31, 45, 52, 67, 73, 81, 89, 94];
        $this->target = 67;
        $this->newNumber = '';
        $this->addError = '';
        $this->search();
    }
    
    public function render()
    {
        return view('livewire.examples.binary-search-example');
    }
}
