<?php

namespace API\Vistasoft\Tests;

use Mockery;
use Zend\Http\Response;
use API\Vistasoft\Connect;
use Zend\Http\Client as ZendClient;

trait APIMock
{
    protected function getMockZendClient($expected = null)
    {
        $mockResponse = Mockery::mock(Response::class)
            ->shouldReceive('getBody')
            ->andReturn(json_encode($expected))
            ->getMock();

        $mockClient = Mockery::mock(ZendClient::class);
        $mockClient->shouldReceive('setUri')->andReturn($mockClient);
        $mockClient->shouldReceive('setHeaders')->andReturn($mockClient);
        $mockClient->shouldReceive('setMethod')->andReturn($mockClient);
        $mockClient->shouldReceive('setParameterGet')->andReturn($mockClient);
        $mockClient->shouldReceive('setParameterPost')->andReturn($mockClient);
        $mockClient->shouldReceive('send')->andReturn($mockResponse);

        return $mockClient;
    }

    protected function getMockConnect()
    {
        $mockConnect = Mockery::mock(Connect::class);
        $mockConnect->shouldReceive('getUrl')->andReturn('');
        $mockConnect->shouldReceive('getKey')->andReturn('');

        return $mockConnect;
    }
}