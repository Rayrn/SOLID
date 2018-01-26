<?php

namespace SOLID\DI;

class PasswordReminder
{
    private $connection;

    public function __construct(iConnection $connection) {
        $this->connection = $connection;
    }

    public function connect()
    {
        return $this->connection->connect();
    }
}
