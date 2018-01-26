<?php

namespace SOLID\SRP\V2\Content;

abstract class Content
{
    /**
     * @var mixed Database value
     */
    protected $data;

    /**
     * Create a new instance of the Component
     *
     * @param mixed $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * PHP Magic Method (called when you try to echo an object)
     *
     * @return string
     */
    abstract public function __toString();
}
