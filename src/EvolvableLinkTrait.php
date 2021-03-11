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
     *
     * @return EvolvableLinkInterface
     */
    public function withHref(\Stringable|string $href): static
    {
        /** @var EvolvableLinkInterface $that */
        $that = clone($this);
        $that->href = $href;

        $that->templated = $this->hrefIsTemplated($href);

        return $that;
    }

    /**
     * {@inheritdoc}
     *
     * @return EvolvableLinkInterface
     */
    public function withRel(string $rel): static
    {
        /** @var EvolvableLinkInterface $that */
        $that = clone($this);
        $that->rel[$rel] = true;
        return $that;
    }

    /**
     * {@inheritdoc}
     *
     * @return EvolvableLinkInterface
     */
    public function withoutRel(string $rel): static
    {
        /** @var EvolvableLinkInterface $that */
        $that = clone($this);
        unset($that->rel[$rel]);
        return $that;
    }

    /**
     * {@inheritdoc}
     *
     * @return EvolvableLinkInterface
     */
    public function withAttribute(string $attribute, string|\Stringable|int|float|bool|array $value): static
    {
        /** @var EvolvableLinkInterface $that */
        $that = clone($this);
        $that->attributes[$attribute] = $value;
        return $that;
    }

    /**
     * {@inheritdoc}
     *
     * @return EvolvableLinkInterface
     */
    public function withoutAttribute(string $attribute): static
    {
        /** @var EvolvableLinkInterface $that */
        $that = clone($this);
        unset($that->attributes[$attribute]);
        return $that;
    }
}
