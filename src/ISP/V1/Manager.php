<?php

namespace SOLID\ISP\V1;

class Manager
{
    private $minions = [];

    public function hire(iWorker $worker)
    {
        $this->minions[] = $worker;
    }

    public function manage()
    {
        foreach ($this->minions as $minion) {
            $minion->work();
        }
    }

    public function feed()
    {
        foreach ($this->minions as $minion) {
            $minion->eat();
        }
    }

    public function drug()
    {
        foreach ($this->minions as $minion) {
            $minion->rest();
        }
    }

    public function check() : array
    {
        $states = [];

        foreach ($this->minions as $minion) {
            $states[] = $minion->getState();
        }

        return $states;
    }
}
