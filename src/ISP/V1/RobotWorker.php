<?php

namespace SOLID\ISP\V1;

class RobotWorker implements iWorker
{
    private $state = '';

    public function work()
    {
        $this->state = 'working';
    }

    public function eat()
    {
        $this->state = '';
    }

    public function rest()
    {
        $this->state = '';
    }

    public function getState() : string
    {
        return $this->state;
    }
}
