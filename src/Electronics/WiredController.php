<?php

namespace Store\Electronics;

use Store\ElectronicType;

class WiredController extends Controller
{
    const MAX_EXTRAS = 0;

    protected $type = ElectronicType::CONTROLLER;

    public function maxExtras(): int
    {
        return self::MAX_EXTRAS;
    }

    function isWired(): bool
    {
        return true;
    }
}