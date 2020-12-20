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
        new RemoteController(10.00),
        new RemoteController(10.00),
        new WiredController(10.00),
        new WiredController(10.00),
    ])),
    new Television(100.00, new ElectronicItems([
        new RemoteController(10.00),
        new RemoteController(10.00),
    ])),
    new Television(200.00, new ElectronicItems([
        new RemoteController(10.00),
    ])),
]);

print_r($basket->sortedItems());
print_r($basket->getItemsByType(ElectronicType::CONSOLE));
