<?php

namespace SOLID\LSP;

class Client
{
    public function areaVerifier(Rectangle $r)
    {
        $r->setWidth(5);
        $r->setHeight(4);
 
        return $r->area() == 20;
    }
}
