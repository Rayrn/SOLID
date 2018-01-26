<?php

namespace SOLID\SRP\V2\Traits;

trait ConvertToUnderscore
{
    /**
     * Convert a key from camel case to underscores
     *
     * @param string $key
     * @return string
     */
    public function convertToUnderscore(string $key) : string
    {
        preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $key, $matches);

        $return = $matches[0];

        foreach ($return as &$match) {
            $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
        }

        return implode('_', $return);
    }
}
