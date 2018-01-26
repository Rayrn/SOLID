<?php

namespace SOLID\OpenClose\V3;

class AreaCalculator
{
    private $shapes = [];

    public function __construct(array $shapes)
    {
        $this->shapes = $shapes;
    }
    
    public function calculateArea() : int
    {
        $area = 0;

        foreach ($this->shapes as $shape) {
            $area += $shape->calculateArea();
        }
        
        return $area;
    }
}
