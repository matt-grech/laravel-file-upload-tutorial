<?php declare(strict_types = 1);

namespace App\Traits;

trait MakeAlias
{
    /**
     * converts name to url friendly alias
     *
     * @param $string
     *
     * @return string
     */
    public function generateSlugFrom($string): string
    {
        // Remove any character that is not alphanumeric, white-space, or a hyphen 
        $string = preg_replace('/[^a-z0-9\s\-]/i', '', $string);
        // Replace all spaces with hyphens
        $string = preg_replace('/\s/', '-', $string);
        // Replace multiple hyphens with a single hyphen
        $string = preg_replace('/\-\-+/', '-', $string);
        // Remove leading and trailing hyphens, and then lowercase the URL
        $string = strtolower(trim($string, '-'));

        return $string;
    }

}