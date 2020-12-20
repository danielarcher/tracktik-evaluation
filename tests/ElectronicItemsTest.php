<?php

use PHPUnit\Framework\TestCase;
use Store\ElectronicItems;
use Store\Electronics\Console;
use Store\Electronics\Microwave;
use Store\Electronics\RemoteController;
use Store\Electronics\Television;
use Store\Electronics\WiredController;
use Store\ElectronicType;
use Store\Exceptions\InvalidItemOnList;
use Store\Exceptions\InvalidType;

class ElectronicItemsTest extends TestCase
{
    public function test_should_create_class_successfully()
    {
        $list = new ElectronicItems([
            new RemoteController(1),
        ]);
        $this->assertInstanceOf(ElectronicItems::class, $list);
    }
    public function test_should_sort_items_correctly()
    {
        $list = new ElectronicItems([
            new Console(3),
            new Television(1),
            new Microwave(2),
        ]);
        $this->assertEquals(ElectronicType::TELEVISION, $list->sortedItems()[0]->type());
    }
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
    public function test_should_not_accept_external_classes()
    {
        $this->expectException(InvalidItemOnList::class);
        $list = new ElectronicItems([
            new stdClass(),
        ]);
    }
    public function test_should_accept_empty_list()
    {
        $list = new ElectronicItems([]);
        $this->assertInstanceOf(ElectronicItems::class, $list);
    }
    public function test_it_should_return_correct_items_per_type()
    {
        $list = new ElectronicItems([
            new Television(1),
            new Console(1),
            new Microwave(1),
        ]);
        $this->assertInstanceOf(Microwave::class, $list->itemsByType(ElectronicType::MICROWAVE)[0]);
    }
    public function test_it_should_return_empty_when_no_items_per_type_found()
    {
        $list = new ElectronicItems([
            new Television(1),
            new Console(1),
            new Microwave(1),
        ]);
        $this->assertEmpty($list->itemsByType(ElectronicType::CONTROLLER));
    }
    public function test_it_should_return_exception_when_invalid_type_given()
    {
        $this->expectException(InvalidType::class);
        $list = new ElectronicItems([
            new Television(1),
            new Console(1),
            new Microwave(1),
        ]);
        $list->itemsByType('invalid_type');
    }
    public function test_it_should_return_array_of_items()
    {
        $list = new ElectronicItems([
            new Television(1),
            new Console(1),
            new Microwave(1),
        ]);
        $this->assertIsArray($list->toArray());
    }
}