<?php

use PHPUnit\Framework\TestCase;
use Store\ElectronicItems;
use Store\Electronics\Console;
use Store\Electronics\Microwave;
use Store\Electronics\RemoteController;
use Store\Exceptions\MaxExtrasAttached;

class MaxExtrasTest extends TestCase
{
    public function test_should_accept_less_than_max_extras()
    {
        $console = new Console(1, new ElectronicItems([
            new RemoteController(1),
            new RemoteController(1),
        ]));
        $this->assertEquals(2, count($console->extras()));
    }
    public function test_should_not_accept_more_than_max_extras()
    {
        $this->expectException(MaxExtrasAttached::class);

        $console = new Console(1, new ElectronicItems([
            new RemoteController(1),
            new RemoteController(1),
            new RemoteController(1),
        ]));
    }
    public function test_should_not_accept_any_extras()
    {
        $this->expectException(MaxExtrasAttached::class);

        $console = new Microwave(1, new ElectronicItems([
            new RemoteController(1),
        ]));
    }
    public function test_should_accept_item_without_extras()
    {
        $console = new Microwave(1);
        $this->assertNull($console->extras());
    }
}