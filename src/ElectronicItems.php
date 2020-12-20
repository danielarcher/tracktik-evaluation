<?php

namespace Store;

use Store\Exceptions\InvalidItemOnList;
use Store\Exceptions\InvalidType;

/**
 * Class ElectronicItems
 *
 * @package Store
 */
class ElectronicItems implements \Countable
{
    /**
     * @var ElectronicItem[]
     */
    private $items = [];

    /**
     * ElectronicItems constructor.
     *
     * @param array $items
     *
     * @throws InvalidItemOnList
     */
    public function __construct(array $items)
    {
        $this->items = $items;
        $this->assertItemsAreValid($items);
    }

    /**
     * @param array|null $items
     *
     * @throws InvalidItemOnList
     */
    private function assertItemsAreValid(?array $items): void
    {
        if (is_null($items) || empty($items)) {
            return;
        }
        array_walk($items, function ($item) {
            if (!$item instanceof ElectronicItem) {
                throw new InvalidItemOnList('This list cannot receive this item');
            }
        });
    }

    /**
     * @return float
     */
    public function total(): float
    {
        return array_sum(array_map(fn($item) => $item->total(), $this->items));
    }

    /**
     * Returns the items depending on the sorting type requested
     *
     * @return array
     */
    public function sortedItems(): array
    {
        /**
         * Refactored to use a more simple and direct approach
         */
        usort($this->items, function ($a, $b) {
            return $a->price() - $b->price();
        });
        return $this->items;
    }

    /**
     * @param string $type
     *
     * @return array
     */
    public function itemsByType(string $type): array
    {
        /**
         * Refactored to use Early returns (or Guard Clauses)
         * https://refactoring.guru/replace-nested-conditional-with-guard-clauses
         * https://medium.com/better-programming/refactoring-guard-clauses-2ceeaa1a9da
         */
        if (!in_array($type, ElectronicType::$types)) {
            throw new InvalidType('Invalid type selected');
        }

        return array_values(array_filter($this->items, function ($item) use ($type) {
            return $item->type() == $type;
        }));
    }

    /**
     * @return int
     */
    public function count()
    {
        return count($this->items);
    }

    /**
     * @codeCoverageIgnore
     * @return array|ElectronicItem[]
     */
    public function items(): array
    {
        return $this->items;
    }

    /**
     * @return array|array[]
     */
    public function toArray()
    {
        return array_map(function ($item) {
            return $item->toArray();
        }, $this->items);
    }
}