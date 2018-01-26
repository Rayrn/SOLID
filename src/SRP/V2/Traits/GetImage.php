<?php

namespace SOLID\SRP\V2\Traits;

trait GetImage
{
    /**
     * Lookup the image from the DB
     *
     * @param string $guid
     * @return array
     */
    public function getImage($guid) : array
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
