<?php

namespace SOLID\LSP;

class Rectangle
{
    private $width;
    private $height;
 
    public function setHeight(int $height)
    {
        $this->height = $height;
    }
 
    public function getHeight() : int
    {
        return $this->height;
    }
 
    public function setWidth(int $width)
    {
        $this->width = $width;
    }
 
    public function getWidth() : int
    {
        return $this->width;
    }

    public function area() :int
    {
        return ($this->width && $this->height)
            ? $this->width * $this->height
            : 0;
    }
}
