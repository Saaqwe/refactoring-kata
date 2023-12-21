<?php

namespace GildedRose\Items;

use GildedRose\Item;

class SulfurasItem extends BasicItem
{
    const NAME = 'Sulfuras, Hand of Ragnaros';
    const SELL_IN_VALUE = 0;
    const QUALITY_VALUE = 80;

    protected int $qualityMaxValue = 80;

    public function __construct(Item $item)
    {
        $item->sellIn = self::SELL_IN_VALUE;
        $item->quality = self::QUALITY_VALUE;

        parent::__construct($item);
    }

    public function update(): void
    {
    }
}