<?php

namespace SOLID\ISP\V1;

class HumanWorker implements iWorker
{
    private $state = '';

    public function work()
    {
        $this->state = 'working';
    }

    public function eat()
    {
        $this->state = 'eating';
    }

    public function rest()
    {
        $this->state = 'sleeping';
    }

    public function getState() : string
    {
        return $this->state;
    }
}
