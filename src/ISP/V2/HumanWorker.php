<?php

namespace SOLID\ISP\V2;

class HumanWorker implements iBiological, iWorkable, iWatchable
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
