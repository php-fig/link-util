<?php


namespace Fig\Link;

trait TemplatedHrefTrait
{
    /**
     * Determines if an href is a templated link or not.
     *
     * @see https://tools.ietf.org/html/rfc6570
     *
     * @param string $href
     *   The href value to check.
     *
     * @return bool
     *   True if the specified href is a templated path, False otherwise.
     */
    private function hrefIsTemplated(string $href): bool
    {
        return str_contains($href, '{') || str_contains($href, '}');
    }
}
