<?php

namespace Store;

use Store\Exceptions\MaxExtrasAttached;

/**
 * Class ElectronicItem
 *
 * @package Store
 */
abstract class ElectronicItem
{
    /**
     * @var float
     */
    public $price;

    /**
     * @var bool
     */
    public $wired;

    /**
     * @var string
     */
    protected $type;

    /**
     * @var ElectronicItems|null
     */
    private $extras;

    /**
     * ElectronicItem constructor.
     *
     * @param                      $price
     * @param ElectronicItems|null $extras
     *
     * @throws MaxExtrasAttached
     */
    public function __construct($price, ?ElectronicItems $extras = null)
    {
        $this->price  = $price;
        $this->extras = $extras;
        $this->assertMaxExtrasItems($this->extras);
    }

    /**
     * @param ElectronicItems|null $extras
     *
     * @throws MaxExtrasAttached
     */
    private function assertMaxExtrasItems(?ElectronicItems $extras): void
    {
        if ($this->maxExtras() < 0 || is_null($extras)) {
            return;
        }
        if (count($extras) > $this->maxExtras()) {
            throw new MaxExtrasAttached('Max items attached on ' . $this->type());
        }
    }

    /**
     * @return int
     */
    abstract public function maxExtras(): int;

    /**
     * @return string
     */
    function type(): string
    {
        return $this->type;
    }

    /**
     * @return float
     */
    function price(): float
    {
        return $this->price;
    }

    /**
     * @return bool
     */
    abstract function isWired(): bool;

    /**
     * @return array
     */
    public function toArray(): array
    {
        return [
            $this->type() => $this->total(),
            'extras'      => $this->extras() ? $this->extras()->toArray() : null,
        ];
    }

    /**
     * @return float
     */
    public function total(): float
    {
        return $this->price + ($this->extras ? $this->extras->total() : 0);
    }

    /**
     * @return ElectronicItems|null
     */
    public function extras(): ?ElectronicItems
    {
        return $this->extras;
    }
}