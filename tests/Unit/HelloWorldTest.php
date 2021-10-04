<?php

namespace App\Tests\Unit;

use App\Controller\HelloWorldController;
use PHPUnit\Framework\TestCase;

class HelloWorldTest extends TestCase
{
    public function testHelloWorld()
    {
        $subject = new HelloWorldController();
        $response = $subject->hi();
        $this->assertSame('Hello World!', $response->getContent());
    }
}