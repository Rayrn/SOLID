<?php

namespace SOLID\OpenClose\V2;

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
            if ($shape instanceof Rectangle) {
                $area += ($shape->width * $shape->height);
            }
            if ($shape instanceof Circle) {
                $area += ($shape->radius * 3.1416);
            }
        }
        
        return $area;
    }
}
