<?php

namespace Store;

class ElectronicType
{
    const TELEVISION = 'television';
    const CONSOLE    = 'console';
    const MICROWAVE  = 'microwave';
    const CONTROLLER = 'controller';

    public static $types = [
        self::CONSOLE,
        self::MICROWAVE,
        self::TELEVISION,
        self::CONTROLLER,
    ];
}