<?php

namespace Store\Electronics;

use Store\ElectronicItem;
use Store\ElectronicType;

/**
 * Class Microwave
 *
 * @package Store\Electronics
 */
class Microwave extends ElectronicItem
{
    /**
     * @var int
     */
    const MAX_EXTRAS = 0;

    /**
     * @var string
     */
    protected $type = ElectronicType::MICROWAVE;

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