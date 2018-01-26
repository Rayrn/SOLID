<?php

namespace SOLID\OpenClose\V3;

class Rectangle extends Shape
{
    public $width;
    public $height;
    
    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }

    public function calculateArea() : int
    {
        return $this->width * $this->height;
    }
}
