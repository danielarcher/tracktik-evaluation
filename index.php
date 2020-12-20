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

?>

My basket
<ul>
<?php foreach ($basket->toArray() as $item): ?>
    <li>Item: <?php echo $item['type'] ?>, price: US$ <?php echo $item['price'] ?>, total: US$ <?php echo $item['total'] ?>
        <ul>
            <?php foreach ($item['extras'] as $extra): ?>
                <li>Extra: <?php echo $extra['type'] ?> <?php echo $extra['wired'] ?: 'wired'; ?>, price: US$ <?php echo $extra['price'] ?></li>
            <?php endforeach; ?>
        </ul>
    </li>
<?php endforeach; ?>
</ul>

Sorted Items
<ul>
    <?php foreach ($basket->sortedItems() as $item): ?>
        <li>Item: <?php echo $item->type() ?>, price: US$ <?php echo $item->price() ?>, total: US$ <?php echo $item->total() ?>
            <ul>
                <?php foreach ($item->extras()->items() as $extra): ?>
                    <li>Extra: <?php echo $extra->type() ?> <?php echo $extra->isWired() ? 'wired' : ''; ?>, price: US$ <?php echo $extra->price() ?></li>
                <?php endforeach; ?>
            </ul>
        </li>
    <?php endforeach; ?>
</ul>

<?php

echo 'Total for item '.ElectronicType::CONSOLE.': '.PHP_EOL;

print_r('price: '.$basket->itemsByType(ElectronicType::CONSOLE)[0]->price().PHP_EOL);
print_r('total with extras: '.$basket->itemsByType(ElectronicType::CONSOLE)[0]->total().PHP_EOL);
