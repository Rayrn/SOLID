<?php

namespace SOLID\LSP;

class Square extends Rectangle
{
    public function setHeight(int $value)
    {
        $this->width = $value;
        $this->height = $value;
    }
 
    public function setWidth(int $value)
    {
        $this->width = $value;
        $this->height = $value;
    }
}
