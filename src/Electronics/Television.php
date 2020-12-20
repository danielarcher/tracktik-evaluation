<?php

namespace Store\Electronics;

use Store\ElectronicType;

class Television extends \Store\ElectronicItem
{
    const MAX_EXTRAS = -1;

    protected $type = ElectronicType::TELEVISION;

    public function maxExtras(): int
    {
        return self::MAX_EXTRAS;
    }

    function isWired(): bool
    {
        return false;
    }
}