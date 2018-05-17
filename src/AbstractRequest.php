<?php

namespace API\Vistasoft;

use Zend\Http\Client as ZendClient;
use Zend\Http\Request;

abstract class AbstractRequest implements RequestInterface
{
    protected $connect;
    protected $client;
    protected $fields = [];

    public function __construct(ConnectInterface $connect, ZendClient $client)
    {
        $this->connect = $connect;
        $this->client = $client;
    }

    public function request($endpoint, $params = [], $method = 'GET'): array
    {
        $url = sprintf(
            '%s/%s/%s',
            $this->connect->getUrl(), $this->getType(), $endpoint
        );

        $this->client->setHeaders(['Accept' => 'application/json']);
        $this->client->setMethod($method);

        $params = array_merge($this->fields, $params);

        if ($method == Request::METHOD_GET) {
            $query = array_merge(['key' => $this->connect->getKey()], $params);
            $this->client->setParameterGet($query);
        } else {
            $url = $url.'?key='.$this->connect->getKey();
            $this->client->setParameterPost($params);
        }

        $this->client->setUri($url);

        $response = $this->client->send();

        return json_decode($response->getBody(), true);
    }

    public function setFields($key, $values = [])
    {
        $this->fields = [$key => json_encode($values)];
    }

    abstract public function getType() : string;
}