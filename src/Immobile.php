<?php

namespace API\Vistasoft;

class Immobile extends AbstractRequest
{
    const TYPE = 'imoveis';

    public function getType(): string
    {
        return self::TYPE;
    }
}
