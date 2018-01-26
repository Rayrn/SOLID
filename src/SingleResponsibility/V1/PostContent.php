<?php

namespace SOLID\SingleResponsibility\V1;

class PostContent extends Component
{
    protected $key = 'post_content';

    /**
     * Create a new instance of the Component
     *
     * @param mixed $value
     */
    public function __construct($value)
    {
        $content = [];

        foreach ($value as $key => $part) {
            if (empty($part->data)) {
                continue;
            }

            switch ($part->type) {
                case 'embed':
                    $content[$key] = $this->buildEmbed($part->data);
                    break;
                case 'heading':
                    $content[$key] = $this->buildHeading($part->data);
                    break;
                case 'pagebreak':
                    $content[$key] = $this->addPagebreak();
                    break;
                case 'image':
                    $content[$key] = $this->buildImageShortcode($part->data);
                    break;
                case 'tip':
                    $content[$key] = $this->buildTipShortcode($part->data);
                    break;
                case 'pull-quote':
                    $content[$key] = $this->buildQuoteShortcode($part->data);
                    break;
                case 'text':
                default:
                    $content[$key] = $this->buildText($part->data);
                    break;
            }
        }

        $this->value = trim(implode("\n", array_filter($content)));
    }

    /**
     * Add a pagebreak
     *
     * @return string
     */
    private function addPagebreak() : string
    {
        return '<!--nextpage-->';
    }

    /**
     * Add an embed
     *
     * @param stdClass $data
     * @return string
     */
    private function buildEmbed(\stdClass $data) : string
    {
        $embed = '';

        switch ($data->provider) {
            case 'brightcove':
                $embed = "[brightcove videoid='{$data->id}' /]";
                break;
            default:
                trigger_error("Unknown provider: {$data->provider}", E_USER_WARNING);
                break;
        }

        return $embed;
    }

    /**
     * Add a heading
     *
     * @return string
     */
    private function buildHeading(\stdClass $data) : string
    {
        if (empty($data->content)) {
            return '';
        }

        switch ($data->level) {
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
                trigger_error("Unknown heading level: {$data->level}", E_USER_WARNING);
                $level = 3;
                break;
        }

        $cleanContent = $this->cleanText($data->content);

        return "<h$level>$cleanContent</h$level>";
    }

    /**
     * Add an image
     *
     * @param stdClass $data
     * @return string
     */
    private function buildImageShortcode(\stdClass $data) : string
    {
        $image = $this->getImage($data->file);

        if ($image) {
            return "[image id='{$image['ID']}' size='landscape_thumbnail' align='none' title='{$image['post_name']}' alt='{$image['post_name']}']";
        }

        trigger_error("Missing image: {$data->file}", E_USER_WARNING);
        return '';
    }

    /**
     * Add a pull-quote
     *
     * @param stdClass $data
     * @return string
     */
    private function buildQuoteShortcode(\stdClass $data) : string
    {
        $authorString = $data->author ? 'author="' . $data->author . '"' : '';

        return '[pullquote quote="' . strip_tags($data->content) . '"' . $authorString . '/]';
    }

    /**
     * Add a text block
     *
     * @param stdClass $data
     * @return string
     */
    private function buildText(\stdClass $data) : string
    {
        return $data->content;
    }

    /**
     * Add a tip shortcode
     *
     * @param stdClass $data
     * @return string
     */
    private function buildTipShortcode(array $data) : string
    {
        $image = null;
        $content = [];

        foreach ($data as $key => $part) {
            if (empty($part->data)) {
                continue;
            }

            switch ($part->type) {
                case 'heading':
                    $content[$key] = $this->buildHeading($part->data);
                    break;
                case 'image':
                    $image = $this->getImage($part->data->file);
                    break;
                case 'text':
                default:
                    $content[$key] = $this->buildText($part->data);
                    break;
            }
        }

        $attachmentString = $image ? "attachment='{$image['ID']}'" : '';

        return "[highlight-box $attachmentString]" . trim(implode("\n", array_filter($content))) . "[/highlight-box]";
    }

    /**
     * Remove unneded html tags
     *
     * @param string $text
     * @return string
     */
    private function cleanText(string $text) : string
    {
        return strip_tags($this->forceSemantic($text), '<a><strong><em>');
    }

    /**
     * Force semantic markup in text
     *
     * @param string $text
     * @return string
     */
    private function forceSemantic(string $text) : string
    {
        $pattern = ['/(<b)([^\w])/i', '/(<i)([^\w])/i'];
        $replacement = ["<strong$2", "<em$2"];
        $subject = str_replace(['</b>', '</i>', '</B>', '</I>'], ['</strong>', '</em>', '</strong>', '</em>'], $text);

        return preg_replace($pattern, $replacement, $subject);
    }

    private function getImage($guid) : array
    {
        global $wpdb;

        $results = $wpdb->get_results($wpdb->prepare(
            "SELECT ID, post_name
            FROM    $wpdb->posts
            WHERE   guid='%s';",
            wp_upload_dir()['url'] . '/' . $guid
        ), 'ARRAY_A');

        foreach ($results as $image) {
            if (!$image) {
                trigger_error("Missing image: {$data->file}", E_USER_WARNING);
            }

            return $image;
        }

        return [];
    }
}
