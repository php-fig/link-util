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

}
