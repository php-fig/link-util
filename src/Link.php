<?php

namespace Fig\Link;

use Psr\Link\EvolvableLinkInterface;

class Link implements EvolvableLinkInterface
{
    // Relations defined in https://www.w3.org/TR/html5/links.html#links and applicable on link elements
    const REL_ALTERNATE = 'alternate';
    const REL_AUTHOR = 'author';
    const REL_HELP = 'help';
    const REL_ICON = 'icon';
    const REL_LICENSE = 'license';
    const REL_SEARCH = 'search';
    const REL_STYLESHEET = 'stylesheet';
    const REL_NEXT = 'next';
    const REL_PREV = 'prev';

    // Relation defined in https://www.w3.org/TR/preload/
    const REL_PRELOAD = 'preload';

    // Relations defined in https://www.w3.org/TR/resource-hints/
    const REL_DNS_PREFETCH = 'dns-prefetch';
    const REL_PRECONNECT = 'preconnect';
    const REL_PREFETCH = 'prefetch';
    const REL_PRERENDER = 'prerender';

    use EvolvableLinkTrait;

    /**
     * Link constructor.
     *
     * @param string $rel
     *   A single relationship to include on this link.
     * @param string $href
     *   An href for this link.
     */
    public function __construct($rel = '', $href = '')
    {
        if ($rel) {
            $this->rel[$rel] = true;
        }
        $this->href = $href;
    }
}
