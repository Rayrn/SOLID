<?php

namespace SOLID\ISP\V1;

require_once '../../../vendor/autoload.php';

$m = new Manager();

$m->hire(new HumanWorker());
$m->hire(new HumanWorker());
$m->hire(new RobotWorker());

$m->manage();
print_r($m->check());

$m->feed();
print_r($m->check());

$m->drug();
print_r($m->check());
