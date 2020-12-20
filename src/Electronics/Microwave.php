<?php

namespace Store\Electronics;

use Store\ElectronicType;

class Microwave extends \Store\ElectronicItem
{
    const MAX_EXTRAS = 0;

    protected $type = ElectronicType::MICROWAVE;

    public function maxExtras(): int
    {
        return self::MAX_EXTRAS;
    }

    function isWired(): bool
    {
        return false;
    }
}