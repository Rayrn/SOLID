<?php

namespace SOLID\LSP;

require_once '../../vendor/autoload.php';

$r = new Rectangle();
$s = new Square();
$c = new Client();

var_dump($c->areaVerifier($r));
var_dump($c->areaVerifier($s));
