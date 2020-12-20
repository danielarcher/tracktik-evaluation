<?php

namespace Store\Electronics;

use Store\ElectronicItem;
use Store\ElectronicType;

/**
 * Class Television
 *
 * @package Store\Electronics
 */
class Television extends ElectronicItem
{
    /**
     * @var int
     */
    const MAX_EXTRAS = -1;

    /**
     * @var string
     */
    protected $type = ElectronicType::TELEVISION;

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