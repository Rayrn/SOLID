<?php

namespace SOLID\SRP\V2\Content;

use SOLID\SRP\V2\Traits\GetImage;

class ContentImageShortcode extends Content
{
    use GetImage;

    /**
     * PHP Magic Method (called when you try to echo an object)
     *
     * @return string
     */
    public function __toString()
    {
        $image = $this->getImage($this->data->file);

        if ($image) {
            return "[image id='{$image['ID']}' size='landscape_thumbnail' align='none' title='{$image['post_name']}' alt='{$image['post_name']}']";
        }

        trigger_error("Missing image: {$this->data->file}", E_USER_WARNING);

        return '';
    }
}
