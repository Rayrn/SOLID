<?php

namespace SOLID\SRP\V2\Traits;

trait CleanText
{
     /**
     * Remove unneded html tags
     *
     * @param string $text
     * @return string
     */
    public function cleanText(string $text) : string
    {
        return strip_tags($this->forceSemantic($text), '<a><strong><em>');
    }

    /**
     * Force semantic markup in text
     *
     * @param string $text
     * @return string
     */
    protected function forceSemantic(string $text) : string
    {
        $pattern = ['/(<b)([^\w])/i', '/(<i)([^\w])/i'];
        $replacement = ["<strong$2", "<em$2"];
        $subject = str_replace(['</b>', '</i>', '</B>', '</I>'], ['</strong>', '</em>', '</strong>', '</em>'], $text);

        return preg_replace($pattern, $replacement, $subject);
    }
}
