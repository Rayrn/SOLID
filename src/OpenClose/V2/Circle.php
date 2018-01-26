<?php

namespace SOLID\OpenClose\V2;

class Circle
{
    public $radius;
    
    public function __construct(int $radius)
    {
        $this->radius = $radius;
    }
}
