<?php

require 'vendor/autoload.php';

use Store\ElectronicItems;
use Store\Electronics\Console;
use Store\Electronics\RemoteController;
use Store\Electronics\Television;
use Store\Electronics\WiredController;
use Store\ElectronicType;

$basket = new ElectronicItems([
    new Console(300.00, new ElectronicItems([
        new RemoteController(20.00),
        new RemoteController(20.00),
        new WiredController(10.00),
        new WiredController(10.00),
    ])),
    new Television(100.00, new ElectronicItems([
        new RemoteController(20.00),
        new RemoteController(20.00),
    ])),
    new Television(200.00, new ElectronicItems([
        new RemoteController(20.00),
    ])),
]);

echo "<pre>";


echo "My Items in the basket:".PHP_EOL;
print_r($basket->toArray());

echo "My Items sorted:".PHP_EOL;
print_r(array_map(function($item) {
    return [$item->type() => ['price' => $item->price(), 'extras' => $item->extras()->total()]];
},$basket->sortedItems()));

echo 'Total for item Console: '.PHP_EOL;

print_r('price: '.$basket->itemsByType(ElectronicType::CONSOLE)[0]->price().PHP_EOL);
print_r('total with extras: '.$basket->itemsByType(ElectronicType::CONSOLE)[0]->total().PHP_EOL);
