<?php

namespace SOLID\SRP\V2\Content;

class ContentQuoteShortcode extends Content
{
    /**
     * PHP Magic Method (called when you try to echo an object)
     *
     * @return string
     */ 
    public function __toString()
    {
        $authorString = $this->data->author ? 'author="' . $this->data->author . '"' : '';

        return '[pullquote quote="' . strip_tags($this->data->content) . '"' . $authorString . '/]';
    }
}
