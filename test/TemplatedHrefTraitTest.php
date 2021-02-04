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
    public function test_templated($href)
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
    public function test_not_templated($href)
    {
        $link = (new Link())
            ->withHref($href);

        $this->assertFalse($link->isTemplated());
    }

    public function templatedHrefProvider()
    {
        return [
            ['http://www.google.com/{param}/foo'],
            ['http://www.google.com/foo?q={param}'],
        ];
    }

    public function notTemplatedHrefProvider()
    {
        return [
            ['http://www.google.com/foo'],
            ['/foo/bar/baz'],
        ];
    }
}
