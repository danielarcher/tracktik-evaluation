<?php

namespace Store\Electronics;

use Store\ElectronicType;

class RemoteController extends Controller
{
    const MAX_EXTRAS = 2;

    protected $type = ElectronicType::CONTROLLER;

    public function maxExtras(): int
    {
        return self::MAX_EXTRAS;
    }

    function isWired(): bool
    {
        return false;
    }
}