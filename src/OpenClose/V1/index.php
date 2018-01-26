<?php

namespace SOLID\OpenClose\V1;

require_once '../../../vendor/autoload.php';

echo (new AreaCalculator([
    new Rectangle(5, 10),
    new Rectangle(10, 20)
]))->calculateArea();
