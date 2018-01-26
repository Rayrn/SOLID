<?php

namespace SOLID\SingleResponsibility\V2\Content;

use SOLID\SingleResponsibility\V2\Traits\GetImage;

class ContentTipShortcode extends Content
{
    use GetImage;

     /**
     * PHP Magic Method (called when you try to echo an object)
     *
     * @return string
     */
    public function __toString()
    {
        $image = null;
        $content = [];

        foreach ($this->data as $key => $part) {
            if (empty($part->data)) {
                continue;
            }

            switch ($part->type) {
                case 'heading':
                    $content[$key] = new ContentHeading($part->data);
                    break;
                case 'image':
                    $image = $this->getImage($part->data->file);
                    break;
                case 'text':
                default:
                    $content[$key] = new ContentText($part->data);
                    break;
            }
        }

        $attachmentString = $image ? "attachment='{$image['ID']}'" : '';

        return "[highlight-box $attachmentString]" . trim(implode("\n", array_filter($content))) . "[/highlight-box]";
    }
}
