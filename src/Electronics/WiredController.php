<?php

namespace Store\Electronics;

use Store\ElectronicType;

/**
 * Class WiredController
 *
 * @package Store\Electronics
 */
class WiredController extends Controller
{
    /**
     * @var int
     */
    const MAX_EXTRAS = 0;

    /**
     * @var string
     */
    protected $type = ElectronicType::CONTROLLER;

    /**
     * @return int
     */
    public function maxExtras(): int
    {
        return self::MAX_EXTRAS;
    }

    /**
     * @return bool
     */
    function isWired(): bool
    {
        return true;
    }
}