<?php

namespace SOLID\OpenClose\V1;

class AreaCalculator
{
    private $rectangles = [];

    public function __construct(array $rectangles)
    {
        $this->rectangles = $rectangles;
    }
    
    public function calculateArea() : int
    {
        $area = 0;

        foreach ($this->rectangles as $rectangle) {
            $area += ($rectangle->width * $rectangle->height);
        }
        
        return $area;
    }
}
