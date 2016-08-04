<?php

namespace Fig\Link;

use Psr\Link\EvolvableLinkCollectionInterface;
use Psr\Link\LinkInterface;

class GenericLinkCollection implements EvolvableLinkCollectionInterface
{
    use EvolvableLinkCollectionTrait;

    /**
     * Constructs a new link collection.
     *
     * @param LinkInterface[] $links
     *   Optionally, specify an initial set of links for this collection.
     *   Note that the keys of the array will be ignored.
     */
    public function __construct(array $links = [])
    {
        // This block will throw a type error if any item isn't a LinkInterface, by design.
        array_filter($links, function(LinkInterface $item) { return true; });

        $hashes = array_map('spl_object_hash', $links);
        $this->links = array_combine($hashes, $links);
    }
}
