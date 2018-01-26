<?php

namespace SOLID\OpenClose\V2;

class Rectangle
{
    public $width;
    public $height;
    
    public function __construct(int $width, int $height)
    {
        $this->width = $width;
        $this->height = $height;
    }
}
