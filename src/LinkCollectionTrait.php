<?php


namespace Fig\Link;

use Psr\Link\LinkCollectionInterface;
use Psr\Link\LinkInterface;

/**
 * Class LinkCollectionTrait
 *
 * @implements LinkCollectionInterface
 */
trait LinkCollectionTrait
{
    /**
     * A collection of the links in this collection.
     *
     * The keys of the array MUST be the spl_object_hash() of the object being stored.
     * That helps to ensure uniqueness.
     *
     * @var LinkInterface[]
     */
    private $links = [];

    /**
     * {@inheritdoc}
     */
    public function getLinks()
    {
        return $this->links;
    }

    /**
     * {@inheritdoc}
     */
    public function getLinksByRel($rel)
    {
        $filter = function (LinkInterface $link) use ($rel) {
            return in_array($rel, $link->getRels());
        };
        return array_filter($this->links, $filter);
    }
}
