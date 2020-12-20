<?php

use PHPUnit\Framework\TestCase;
use Store\ElectronicItems;
use Store\Electronics\Console;
use Store\Electronics\Microwave;
use Store\Electronics\Television;

class SortItemsTest extends TestCase
{
    public function test_should_sort_items_correctly()
    {
        $list = new ElectronicItems([
            new Console(3),
            new Television(1),
            new Microwave(2),
        ]);
        $this->assertEquals(\Store\ElectronicType::TELEVISION, $list->sortedItems()[0]->type());
    }
}