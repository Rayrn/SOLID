<?php

namespace SOLID\ISP\V1;

interface iWorker
{
    public function work();

    public function eat();

    public function rest();

    public function getState() : string;
}
