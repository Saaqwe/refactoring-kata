<?php

declare(strict_types=1);

namespace GildedRose;

use GildedRose\Items\Factories\ItemsFactory;

final class GildedRose
{
    /**
     * @param Item[] $items
     */
    public function __construct(private array $items)
    {
    }

    public function updateQuality(): void
    {
        array_walk($this->items, function (Item $item) {
            $gildedRoseItem = ItemsFactory::createItem($item);
            $gildedRoseItem->update();
        });
    }
}
