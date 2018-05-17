<?php

namespace API\Vistasoft\Tests;

use API\Vistasoft\Client;
use PHPUnit\Framework\TestCase;
use API\Vistasoft\RequestInterface;

class ClientTest extends TestCase
{
    use APIMock;

    public function testCheckIfClassImplementsInterfaceRequest()
    {
        $class = new Client($this->getMockConnect(), $this->getMockZendClient());
        $this->assertTrue($class instanceof RequestInterface);
    }

    public function testCheckReturnMetodRequest()
    {
        $expected = ['a' => 1, 'b' => 2];

        $class = new Client(
            $this->getMockConnect(),
            $this->getMockZendClient($expected)
        );
        $result = $class->request('detalhes');

        $this->assertEquals($expected, $result);
    }
}