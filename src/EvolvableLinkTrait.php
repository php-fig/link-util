<?php


namespace Fig\Link;

use Psr\Link\EvolvableLinkInterface;

/**
 * Class EvolvableLinkTrait
 *
 * @implements EvolvableLinkInterface
 */
trait EvolvableLinkTrait
{
    use LinkTrait;

    /**
     * {@inheritdoc}
     */
    public function withHref($href) {
        $that = clone($this);
        $that->href = $href;

        $that->templated = ($this->hrefIsTemplated($href));

        return $that;
    }

    /**
     * {@inheritdoc}
     */
    public function withTemplated($templated) {
        $that = clone($this);
        $that->templated = (bool)$templated;
        return $that;
    }

    /**
     * {@inheritdoc}
     */
    public function withRel($rel) {
        $that = clone($this);
        $that->rel[$rel] = true;
        return $that;
    }

    /**
     * {@inheritdoc}
     */
    public function withoutRel($rel) {
        $that = clone($this);
        unset($that->rel[$rel]);
        return $that;
    }

    /**
     * {@inheritdoc}
     */
    public function withAttribute($attribute, $value) {
        $that = clone($this);
        $that->attributes[$attribute] = $value;
        return $that;
    }

    /**
     * {@inheritdoc}
     */
    public function withoutAttribute($attribute) {
        $that = clone($this);
        unset($that->attributes[$attribute]);
        return $that;
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
