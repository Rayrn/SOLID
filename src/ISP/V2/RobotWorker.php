<?php

namespace SOLID\ISP\V2;

class RobotWorker implements iWorkable, iWatchable
{
    private $state = '';

    public function work()
    {
        $this->state = 'working';
    }

    public function getState() : string
    {
        return $this->state;
    }
}
