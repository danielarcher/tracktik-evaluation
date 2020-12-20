<?php

namespace Store;

class ElectronicItems implements \Countable
{
    /**
     * @var ElectronicItem[]
     */
    private $items = [];

    public function __construct(array $items)
    {
        $this->items = $items;
    }

    /**
     * Returns the items depending on the sorting type requested
     *
     * @return array
     */
    public function sortedItems(): array
    {
        usort($this->items, function ($a, $b) {
            return $a->price() - $b->price();
        });
        return $this->items;

        $sorted = [];
        foreach ($this->items as $item) {
            $sorted[($item->price * 100)] = $item;
        }
        return ksort($sorted, SORT_NUMERIC);
    }

    /**
     * @param string $type
     *
     * @return array
     */
    public function getItemsByType($type)
    {
        if (in_array($type, ElectronicItem::$types)) {
            $callback = function ($item) use ($type) {
                return $item->type == $type;
            };
            $items    = array_filter($this->items, $callback);
        }
        return false;
    }

    public function count()
    {
        return count($this->items);
    }
}