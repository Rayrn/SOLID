<?php

namespace SOLID\OpenClose\V2;

require_once '../../../vendor/autoload.php';

echo (new AreaCalculator([
    new Rectangle(5, 10),
    new Circle(10)
]))->calculateArea();
