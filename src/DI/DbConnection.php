<?php

namespace SOLID\DI;

class DbConnection implements iConnection
{
    public function connect() {
        return true;
    }
}
