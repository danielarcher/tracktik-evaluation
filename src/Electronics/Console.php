<?php

namespace Store\Electronics;

use Store\ElectronicItem;
use Store\ElectronicType;

/**
 * Class Console
 *
 * @package Store\Electronics
 */
class Console extends ElectronicItem
{
    /**
     * @var int
     */
    const MAX_EXTRAS = 4;

    /**
     * @var string
     */
    protected $type = ElectronicType::CONSOLE;

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
        return false;
    }
}