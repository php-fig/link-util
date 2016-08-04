<?php

namespace Fig\Link;

use Psr\Link\LinkInterface;

/**
 * Class LinkTrait
 *
 * @inherits LinkInterface
 */
trait LinkTrait
{

    /**
     *
     *
     * @var string
     */
    private $href = '';

    /**
     * The set of rels on this link.
     *
     * Note: Because rels are an exclusive set, we use the keys of the array
     * to store the rels that have been added, not the values. The values
     * are simply boolean true.  A rel is present if the key is set, false
     * otherwise.
     *
     * @var string[]
     */
    private $rel = [];

    /**
     *
     *
     * @var string
     */
    private $attributes = [];

    /**
     * {@inheritdoc}
     */
    public function getHref() {
        return $this->href;
    }

    /**
     * {@inheritdoc}
     */
    public function isTemplated() {
        return $this->hrefIsTemplated($this->href);
    }

    /**
     * {@inheritdoc}
     */
    public function getRel() {
        return array_keys($this->rel);
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes() {
        return $this->attributes;
    }

    /**
     * Determines if an href is a templated link or not.
     *
     * @param string $href
     *   The href value to check.
     *
     * @return bool
     *   True if the specified href is a templated path, False otherwise.
     */
    private function hrefIsTemplated($href)
    {
        return strpos($href, '{') !== false ||strpos($href, '}') !== false;
    }
}
