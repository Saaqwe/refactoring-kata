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
        return match ($item->name) {
            AgedBrieItem::NAME => new AgedBrieItem($item),
            BackstagePasseItem::NAME => new BackstagePasseItem($item),
            SulfurasItem::NAME => new SulfurasItem($item),
            ConjuredItem::NAME => new ConjuredItem($item),
            default => new BasicItem($item),
        };
    }
}