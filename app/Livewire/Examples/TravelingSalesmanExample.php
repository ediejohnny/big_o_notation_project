<?php

namespace App\Livewire\Examples;

use Livewire\Component;

/**
 * TravelingSalesmanExample
 *
 * Simplified Traveling Salesman Problem (TSP) demonstration.
 * Shows O(n!) complexity by testing all possible routes.
 */
class TravelingSalesmanExample extends Component
{
    public int $cities = 5;
    /** @var array<int,array{name:string,x:int,y:int}> */
    public array $cityList = [];
    public ?array $bestRoute = null;
    public float $bestDistance = 0.0;
    public int $routesTested = 0;
    public float $timeMs = 0.0;
    public ?string $errorMessage = null;

    // Maximum safe value to prevent factorial explosion
    private const MAX_SAFE_CITIES = 10;

    public function mount(): void
    {
        $this->generateCities();
    }

    public function updatedCities(): void
    {
        $this->generateCities();
        $this->bestRoute = null;
        $this->bestDistance = 0.0;
        $this->routesTested = 0;
        $this->timeMs = 0.0;
    }

    private function generateCities(): void
    {
        $names = ['Casa', 'Escola', 'Mercado', 'Academia', 'Parque', 'Cinema', 'Shopping', 'Biblioteca', 'Hospital', 'Praia'];
        $this->cityList = [];
        
        for ($i = 0; $i < min($this->cities, count($names)); $i++) {
            $this->cityList[] = [
                'name' => $names[$i],
                'x' => rand(10, 90),
                'y' => rand(10, 90)
            ];
        }
    }

    public function run(): void
    {
        $this->bestRoute = null;
        $this->bestDistance = PHP_FLOAT_MAX;
        $this->routesTested = 0;
        $this->errorMessage = null;

        // Validate input
        if ($this->cities > self::MAX_SAFE_CITIES) {
            $factorial = $this->calculateFactorial($this->cities);
            $this->errorMessage = "⚠️ ATENÇÃO: Mais de " . self::MAX_SAFE_CITIES . " cidades causam explosão fatorial! Com n=" . $this->cities . ", seriam " . $this->cities . "! = " . number_format($factorial, 0, ',', '.') . " rotas possíveis. Use no máximo " . self::MAX_SAFE_CITIES . " cidades.";
            return;
        }

        if ($this->cities < 2) {
            $this->errorMessage = "❌ Precisa de pelo menos 2 cidades.";
            return;
        }

        $start = microtime(true);

        // Generate all permutations of cities
        $cityIndices = range(0, $this->cities - 1);
        $allRoutes = $this->generatePermutations($cityIndices);

        // Test each route
        foreach ($allRoutes as $route) {
            $distance = $this->calculateRouteDistance($route);
            $this->routesTested++;
            
            if ($distance < $this->bestDistance) {
                $this->bestDistance = $distance;
                $this->bestRoute = $route;
            }
        }

        $this->timeMs = (microtime(true) - $start) * 1000.0;
    }

    /**
     * @param array<int,int> $route
     */
    private function calculateRouteDistance(array $route): float
    {
        $distance = 0.0;
        
        for ($i = 0; $i < count($route) - 1; $i++) {
            $city1 = $this->cityList[$route[$i]];
            $city2 = $this->cityList[$route[$i + 1]];
            
            $dx = $city1['x'] - $city2['x'];
            $dy = $city1['y'] - $city2['y'];
            $distance += sqrt($dx * $dx + $dy * $dy);
        }
        
        // Return to starting city
        $first = $this->cityList[$route[0]];
        $last = $this->cityList[$route[count($route) - 1]];
        $dx = $first['x'] - $last['x'];
        $dy = $first['y'] - $last['y'];
        $distance += sqrt($dx * $dx + $dy * $dy);
        
        return $distance;
    }

    /**
     * @param array<int,int> $items
     * @param array<int,int> $current
     * @return array<int,array<int,int>>
     */
    private function generatePermutations(array $items, array $current = []): array
    {
        if (count($items) === 0) {
            return [$current];
        }

        $result = [];
        foreach ($items as $i => $item) {
            $remaining = $items;
            unset($remaining[$i]);
            $remaining = array_values($remaining);
            
            $newCurrent = $current;
            $newCurrent[] = $item;
            
            $subPermutations = $this->generatePermutations($remaining, $newCurrent);
            $result = array_merge($result, $subPermutations);
        }

        return $result;
    }

    private function calculateFactorial(int $n): float
    {
        if ($n <= 1) {
            return 1;
        }

        $result = 1.0;
        for ($i = 2; $i <= $n; $i++) {
            $result *= $i;
        }
        return $result;
    }

    public function render()
    {
        return view('livewire.examples.traveling-salesman-example');
    }
}
