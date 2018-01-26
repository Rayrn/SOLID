<?php

namespace SOLID\DI;

require_once '../../vendor/autoload.php';

$passwordReminder = new PasswordReminder(new DbConnection());

var_dump($passwordReminder->connect());
