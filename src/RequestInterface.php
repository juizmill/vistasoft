<?php

namespace API\Vistasoft;

use Zend\Http\Client as ZendClient;

interface RequestInterface
{
    public function __construct(ConnectInterface $connect, ZendClient $client);
    public function request($endpoint, $params = [], $method = 'POST') : array;
}
