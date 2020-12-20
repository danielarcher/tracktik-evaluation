<?php

namespace Store;

use Store\Exceptions\MaxExtrasAttached;

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

    public function __construct($price, ?ElectronicItems $extras = null)
    {
        $this->price  = $price;
        $this->extras = $extras;
        $this->assertMaxExtrasItems($this->extras);
    }

    private function assertMaxExtrasItems(?ElectronicItems $extras): void
    {
        if ($this->maxExtras() < 0 || is_null($extras)) {
            return;
        }
        if (count($extras) > $this->maxExtras()) {
            throw new MaxExtrasAttached('Max items attached on ' . $this->type());
        }
    }

    abstract public function maxExtras(): int;

    function type(): string
    {
        return $this->type;
    }

    function price(): float
    {
        return $this->price;
    }

    abstract function isWired(): bool;

    public function toArray(): array
    {
        return [
            $this->type() => $this->total(),
            'extras'      => $this->extras() ? $this->extras()->toArray() : null,
        ];
    }

    public function total(): float
    {
        return $this->price + ($this->extras ? $this->extras->total() : 0);
    }

    public function extras(): ?ElectronicItems
    {
        return $this->extras;
    }
}