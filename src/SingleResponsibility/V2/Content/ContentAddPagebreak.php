<?php

namespace SOLID\SingleResponsibility\V2\Content;

class ContentAddPageBreak extends Content
{
     /**
     * PHP Magic Method (called when you try to echo an object)
     *
     * @return string
     */
    public function __toString()
    {
        return '<!--nextpage-->';
    }
}
