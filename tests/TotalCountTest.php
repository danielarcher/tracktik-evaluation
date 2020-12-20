<?php

use PHPUnit\Framework\TestCase;
use Store\ElectronicItems;
use Store\Electronics\Console;
use Store\Electronics\RemoteController;
use Store\Electronics\WiredController;

class TotalCountTest extends TestCase
{
    public function test_should_return_total_of_items()
    {
        $list = new ElectronicItems([
            new RemoteController(1),
            new RemoteController(1),
            new RemoteController(1),
        ]);
        $this->assertEquals(3, $list->total());
    }
    public function test_should_return_total_of_items_with_extras()
    {
        $list = new ElectronicItems([
            new Console(1, new ElectronicItems([
                new WiredController(1),
            ])),
            new RemoteController(1),
            new RemoteController(1),
        ]);
        $this->assertEquals(4, $list->total());
    }
}