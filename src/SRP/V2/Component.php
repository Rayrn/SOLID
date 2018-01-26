<?php

namespace SOLID\SRP\V2;

abstract class Component
{
    /**
     * @var string Database key
     */
    protected $key;

    /**
     * @var mixed Database value
     */
    protected $value;

    /**
     * Create a new instance of the Component
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * Build up the object representation and return the component as ['key' => $key, 'value' => $value]
     *
     * @return array
     */
    public function build(array $postData) : array
    {
        $postData[$this->key] = $this->value;

        return $postData;
    }
}
