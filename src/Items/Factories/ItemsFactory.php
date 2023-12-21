<?php

namespace GildedRose\Items\Factories;

use GildedRose\Item;
use GildedRose\Items\AgedBrieItem;
use GildedRose\Items\BackstagePasseItem;
use GildedRose\Items\BasicItem;
use GildedRose\Items\ConjuredItem;
use GildedRose\Items\SulfurasItem;
use GildedRose\Items\GildedRoseItemAbstract;

class ItemsFactory
{
    public static function createItem(Item $item): GildedRoseItemAbstract
    {
        return match (true) {
            $item->name === AgedBrieItem::NAME => new AgedBrieItem($item),
            $item->name === BackstagePasseItem::NAME => new BackstagePasseItem($item),
            $item->name === SulfurasItem::NAME => new SulfurasItem($item),
            str_contains($item->name, ConjuredItem::NAME) => new ConjuredItem($item),
            default => new BasicItem($item),
        };
    }
}
