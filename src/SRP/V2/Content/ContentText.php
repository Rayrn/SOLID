<?php

namespace SOLID\SRP\V2\Content;

class ContentText extends Content
{
     /**
     * PHP Magic Method (called when you try to echo an object)
     *
     * @return string
     */
    public function __toString()
    {
        return $this->data->content;
    }
}
