<?php

namespace Store;

class ElectronicItem
{
    const ELECTRONIC_ITEM_TELEVISION = 'television';
    const ELECTRONIC_ITEM_CONSOLE    = 'console';
    const ELECTRONIC_ITEM_MICROWAVE  = 'microwave';

    private static $types = [
        self::ELECTRONIC_ITEM_CONSOLE,
        self::ELECTRONIC_ITEM_MICROWAVE,
        self::ELECTRONIC_ITEM_TELEVISION
    ];
    /**
     * @var float
     */
    public $price;
    public $wired;
    /**
     * @var string
     */
    private $type;

    function getPrice()
    {
        return $this->price;
    }

    function setPrice($price)
    {
        $this->price = $price;
    }

    function getType()
    {
        return $this->type;
    }

    function setType($type)
    {
        $this->type = $type;
    }

    function getWired()
    {
        return $this->wired;
    }

    function setWired($wired)
    {
        $this->wired = $wired;
    }
}