<?php

namespace SOLID\SingleResponsibility\V2\Content;

use SOLID\SingleResponsibility\V2\Traits\CleanText;

class ContentHeading extends Content
{
    use CleanText;

     /**
     * PHP Magic Method (called when you try to echo an object)
     *
     * @return string
     */
    public function __toString()
    {
        if (empty($this->data->content)) {
            return '';
        }

        switch ($this->data->level) {
            case 'main':
                $level = 2;
                break;
            case 'sub':
                $level = 3;
                break;
            case 'embed':
                $level = 4;
                break;
            default:
                trigger_error("Unknown heading level: {$this->data->level}", E_USER_WARNING);
                $level = 3;
                break;
        }

        $cleanContent = $this->cleanText($this->data->content);

        return "<h$level>$cleanContent</h$level>";
    }
}
