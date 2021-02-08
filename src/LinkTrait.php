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
    use TemplatedHrefTrait;

    private string $href = '';

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
    private array $rel = [];

    private array $attributes = [];

    /**
     * {@inheritdoc}
     */
    public function getHref(): string
    {
        return $this->href;
    }

    /**
     * {@inheritdoc}
     */
    public function isTemplated(): bool
    {
        return $this->hrefIsTemplated($this->href);
    }

    /**
     * {@inheritdoc}
     */
    public function getRels(): array
    {
        return array_keys($this->rel);
    }

    /**
     * {@inheritdoc}
     */
    public function getAttributes(): array
    {
        return $this->attributes;
    }
}
