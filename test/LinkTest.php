<?php

namespace Fig\Link\Tests;

use Fig\Link\Link;
use PHPUnit\Framework\TestCase;

class LinkTest extends TestCase
{

    public function test_can_set_and_retrieve_values(): void
    {
        $link = (new Link())
            ->withHref('http://www.google.com')
            ->withRel('next')
            ->withAttribute('me', 'you')
        ;

        $this->assertEquals('http://www.google.com', $link->getHref());
        $this->assertContains('next', $link->getRels());
        $this->assertArrayHasKey('me', $link->getAttributes());
        $this->assertEquals('you', $link->getAttributes()['me']);
    }

    public function test_can_remove_values(): void
    {
        $link = (new Link())
            ->withHref('http://www.google.com')
            ->withRel('next')
            ->withAttribute('me', 'you')
        ;

        $link = $link->withoutAttribute('me')
            ->withoutRel('next');

        $this->assertEquals('http://www.google.com', $link->getHref());
        $this->assertFalse(in_array('next', $link->getRels()));
        $this->assertFalse(array_key_exists('me', $link->getAttributes()));
    }

    public function test_multiple_rels(): void
    {
        $link = (new Link())
            ->withHref('http://www.google.com')
            ->withRel('next')
            ->withRel('reference');

        $this->assertCount(2, $link->getRels());
        $this->assertContains('next', $link->getRels());
        $this->assertContains('reference', $link->getRels());
    }

    public function test_constructor(): void
    {
        $link = new Link('next', 'http://www.google.com');

        $this->assertEquals('http://www.google.com', $link->getHref());
        $this->assertContains('next', $link->getRels());
    }
}
