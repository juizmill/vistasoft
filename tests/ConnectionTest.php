<?php

namespace API\Vistasoft\Tests;

use API\Vistasoft\Connect;
use PHPUnit\Framework\TestCase;
use API\Vistasoft\ConnectInterface;

class ConnectionTest extends TestCase
{
    public function testCheckIfClassImplementsInterfaceConnect()
    {
        $class = new Connect();
        $this->assertTrue($class instanceof ConnectInterface);
    }

    public function testMethodIsSandboxIsBoolean()
    {
        $class = new Connect();
        $this->assertTrue($class->isSandbox(true));
    }

    public function testReturnMethodGetKey()
    {
        $class = new Connect();
        $class->setKey('12345');

        $this->assertEquals('12345', $class->getKey());
    }

    public function testMethodGetUrlReturnStringSandbox()
    {
        $class = new Connect();
        $class->isSandbox(true);
        $this->assertEquals($class->getUrl(), 'http://sandbox-rest.vistahost.com.br');
    }

    public function testMethodGetUrlReturnStringToClient()
    {
        $class = new Connect();
        $class->setClientId(123456);
        $this->assertEquals($class->getUrl(), 'http://123456-rest.vistahost.com.br');
    }

    public function testConnectionParametersFromConstruct()
    {
        $class = new Connect(12345, 'keyclient', true);
        $this->assertNotNull($class->getUrl());
    }
}