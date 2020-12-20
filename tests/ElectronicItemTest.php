<?php

use PHPUnit\Framework\TestCase;
use Store\ElectronicItem;
use Store\ElectronicItems;
use Store\Electronics\Console;
use Store\Electronics\Microwave;
use Store\Electronics\RemoteController;
use Store\Electronics\Television;
use Store\Electronics\WiredController;
use Store\Exceptions\MaxExtrasAttached;

class ElectronicItemTest extends TestCase
{
    public function test_should_accept_less_than_max_extras()
    {
        $console = new Console(1, new ElectronicItems([
            new RemoteController(1),
            new RemoteController(1),
        ]));
        $this->assertEquals(2, count($console->extras()));
    }
    public function test_should_accept_exact_quantity_of_max_extras()
    {
        $console = new Console(1, new ElectronicItems([
            new RemoteController(1),
            new RemoteController(1),
            new RemoteController(1),
            new RemoteController(1),
        ]));
        $this->assertEquals(4, count($console->extras()));
    }
    public function test_should_not_accept_more_than_max_extras()
    {
        $this->expectException(MaxExtrasAttached::class);

        $item = new Console(1, new ElectronicItems([
            new RemoteController(1),
            new RemoteController(1),
            new RemoteController(1),
            new RemoteController(1),
            new RemoteController(1),
        ]));
    }
    public function test_should_not_accept_any_extras()
    {
        $this->expectException(MaxExtrasAttached::class);

        $item = new Microwave(1, new ElectronicItems([
            new RemoteController(1),
        ]));
    }
    public function test_television_should_accept_unlimited_extras()
    {
        $extras = [];
        foreach (range(1, 100) as $i) {
            $extras[] = new RemoteController(1);
        }
        $item = new Television(1, new ElectronicItems($extras));
        $this->assertEquals(100, count($item->extras()));
    }
    public function test_should_accept_item_without_extras()
    {
        $console = new Microwave(1);
        $this->assertNull($console->extras());
    }

    /**
     * @dataProvider wiredItems
     */
    public function test_should_check_if_item_is_wired($expected, ElectronicItem $item)
    {
        $this->assertEquals($expected, $item->isWired());
    }

    public function wiredItems()
    {
        return[
            'Wired controller is wired' => [true, new WiredController(1)],
            'Remote Controller is not wired' => [false, new RemoteController(1)],
            'Microwave is not wired' => [false, new Microwave(1)],
            'Television is not wired' => [false, new Television(1)],
            'Console is not wired' => [false, new Console(1)],
        ];
    }
}