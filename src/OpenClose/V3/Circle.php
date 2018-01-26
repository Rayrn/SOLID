<?php

namespace SOLID\OpenClose\V3;

class Circle extends Shape
{
    public $radius;
    
    public function __construct(int $radius)
    {
        $this->radius = $radius;
    }

    public function calculateArea() : int
    {
        return $this->radius * $this->radius * 3.1416;
    }
}
