<?php

namespace SOLID\SingleResponsibility\V2\Content;

class ContentEmbed extends Content
{
    /**
     * PHP Magic Method (called when you try to echo an object)
     *
     * @return string
     */
    public function __toString()
    {
        $embed = '';

        switch ($this->data->provider) {
            case 'brightcove':
                $embed = "[brightcove videoid='{$this->data->id}' /]";
                break;
            default:
                trigger_error("Unknown provider: {$this->data->provider}", E_USER_WARNING);
                break;
        }

        return $embed;
    }
}
