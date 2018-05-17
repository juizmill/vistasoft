<?php

namespace API\Vistasoft;


class Client extends AbstractRequest
{
    const TYPE = 'clientes';

    public function getType(): string
    {
        return self::TYPE;
    }
}