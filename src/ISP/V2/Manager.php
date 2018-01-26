<?php

namespace SOLID\ISP\V2;

class Manager
{
    private $minions = [];

    public function hire(iWorkable $worker)
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
            if ($minion instanceof iBiological) {
                $minion->eat();
            }
        }
    }

    public function drug()
    {
        foreach ($this->minions as $minion) {
            if ($minion instanceof iBiological) {
                $minion->rest();
            }
        }
    }

    public function check() : array
    {
        $states = [];

        foreach ($this->minions as $minion) {
            $states[] = $minion instanceof iWatchable ? $minion->getState() : '???';
        }

        return $states;
    }
}
