<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\Items\ConjuredItem;
use PHPUnit\Framework\TestCase;

class ConjuredItemTest extends TestCase
{
    public function testUpdate(): void
    {
        $receiveItems = [new Item(ConjuredItem::NAME, 14, 4)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([13, 2], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }

    public function testSellInZeroUpdate(): void
    {
        $receiveItems = [new Item(ConjuredItem::NAME, 0, 18)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([-1, 14], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }
}
