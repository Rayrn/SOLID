<?php

namespace SOLID\SingleResponsibility\V2;

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
                    $content[$key] = new Content\ContentEmbed($part->data);
                    break;
                case 'heading':
                    $content[$key] = new Content\ContentHeading($part->data);
                    break;
                case 'pagebreak':
                    $content[$key] = new Content\ContentAddPagebreak($part->data);
                    break;
                case 'image':
                    $content[$key] = new Content\ContentImageShortcode($part->data);
                    break;
                case 'tip':
                    $content[$key] = new Content\ContentTipShortcode($part->data);
                    break;
                case 'pull-quote':
                    $content[$key] = new Content\ContentQuoteShortcode($part->data);
                    break;
                case 'text':
                default:
                    $content[$key] = new Content\ContentText($part->data);
                    break;
            }
        }

        $this->value = trim(implode("\n", array_filter($content)));
    }
}
