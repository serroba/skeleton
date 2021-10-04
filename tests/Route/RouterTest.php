<?php

namespace App\Tests\Route;

use App\Route\Router;
use PHPUnit\Framework\TestCase;

class RouterTest extends TestCase
{

    public function testRouteConfiguration()
    {
        $subject = new Router();
        $route = $subject->withRoute('/bar', 'result');
        $this->assertSame("result", $route->route('/bar')->getPath());
    }

    public function testRouteThrowsExceptionWhenNotPatchIsFound()
    {
        $subject = new Router();
        $route = $subject->withRoute('/bar', 'result');
        $this->expectException(\InvalidArgumentException::class);
        $this->assertSame("result", $route->route('/no-bar')->getPath());
    }

    public function testRouteHandlesWildcard()
    {
        $subject = new Router();
        $route = $subject->withRoute('/bar/*/baz', 'foo');
        $this->assertSame("foo", $route->route('/bar/something/baz')->getPath());
    }

    public function testRouteHandlesWildcardSecond()
    {
        $subject = new Router();
        $route = $subject->withRoute('/bar/baz/*', 'bar2');
        $this->assertSame("bar2", $route->route('/bar/baz/something-else')->getPath());
    }

    public function testWithParams()
    {
        $subject = new Router();
        $route = $subject->withRoute('/foo/{id}', 'bar2');
        $this->assertSame("bar2", $route->route('/foo/123')->getPath());
    }
}
