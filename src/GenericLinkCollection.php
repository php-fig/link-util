<?php

namespace Fig\Link;

use Psr\Link\EvolvableLinkCollectionInterface;
use Psr\Link\LinkInterface;

class GenericLinkCollection implements EvolvableLinkCollectionInterface
{
    use EvolvableLinkCollectionTrait;
}
