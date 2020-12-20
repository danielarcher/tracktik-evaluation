<?php

namespace Store;

/**
 * Class ElectronicType
 *
 * @package Store
 */
class ElectronicType
{
    const TELEVISION = 'television';
    const CONSOLE    = 'console';
    const MICROWAVE  = 'microwave';
    const CONTROLLER = 'controller';

    /**
     * @var string[]
     */
    public static $types = [
        self::CONSOLE,
        self::MICROWAVE,
        self::TELEVISION,
        self::CONTROLLER,
    ];
}