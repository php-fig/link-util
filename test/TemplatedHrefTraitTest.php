<?php


namespace Fig\Link\Tests;


use Fig\Link\Link;
use PHPUnit\Framework\TestCase;

class TemplatedHrefTraitTest extends TestCase
{
    /**
     *
     * @dataProvider templatedHrefProvider
     *
     * @param string $href
     *   The href to check.
     */
    public function test_templated(string $href): void
    {
        $link = (new Link())
            ->withHref($href);

        $this->assertTrue($link->isTemplated());
    }

    /**
     *
     * @dataProvider notTemplatedHrefProvider
     *
     * @param string $href
     *   The href to check.
     */
    public function test_not_templated(string $href): void
    {
        $link = (new Link())
            ->withHref($href);

        $this->assertFalse($link->isTemplated());
    }

    public function templatedHrefProvider(): iterable
    {
        return [
            ['http://www.google.com/{param}/foo'],
            ['http://www.google.com/foo?q={param}'],
        ];
    }

    public function notTemplatedHrefProvider(): iterable
    {
        return [
            ['http://www.google.com/foo'],
            ['/foo/bar/baz'],
        ];
    }
}
