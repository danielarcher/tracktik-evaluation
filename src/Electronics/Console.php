<?php

namespace Store\Electronics;

use Store\ElectronicType;

class Console extends \Store\ElectronicItem
{
    const MAX_EXTRAS = 2;

    protected $type = ElectronicType::CONSOLE;

    public function maxExtras(): int
    {
        return self::MAX_EXTRAS;
    }

    function isWired(): bool
    {
        return false;
    }
}