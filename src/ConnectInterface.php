<?php

namespace API\Vistasoft;


interface ConnectInterface
{
    public function setKey(string $key);
    public function getKey() : string ;
    public function setClientId(string $clientId);
    public function getUrl() : string;
    public function isSandbox(bool $sandbox = false) : bool;
}