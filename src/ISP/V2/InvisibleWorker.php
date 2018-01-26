<?php

namespace SOLID\ISP\V2;

class InvisibleWorker implements iBiological, iWorkable
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
}
