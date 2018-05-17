<?php

namespace API\Vistasoft;

class Connect implements ConnectInterface
{
    const SANDBOX = 'http://sandbox-rest.vistahost.com.br';
    const URL_CLIENT = 'http://%s-rest.vistahost.com.br';

    private $key;
    private $clientId;
    private $isSandbox;

    public function __construct($clientId = null, $key = null, $isSandbox = false)
    {
        $this->clientId = $clientId;
        $this->key = $key;
        $this->isSandbox = $isSandbox;
    }

    public function setKey(string $key)
    {
        $this->key = $key;
        return $this;
    }

    public function getKey() : string
    {
        return $this->key;
    }

    public function setClientId(string $clientId)
    {
        $this->clientId = $clientId;
        return $this;
    }

    public function getUrl(): string
    {
        $url = sprintf(self::URL_CLIENT, $this->clientId);

        if ($this->isSandbox == true) {
            $url = self::SANDBOX;
        }

        return $url;
    }

    public function isSandbox(bool $sandbox = false): bool
    {
        $this->isSandbox = $sandbox;
        return $sandbox;
    }
}