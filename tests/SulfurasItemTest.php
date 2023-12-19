<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\Items\SulfurasItem;
use PHPUnit\Framework\TestCase;

class SulfurasItemTest extends TestCase
{
    public function testFreshUpdate(): void
    {
        $receiveItems = [new Item(SulfurasItem::NAME, 7, 80)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([7, 80], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }

    public function testSellInZeroUpdate(): void
    {
        $receiveItems = [new Item('potion', 0, 80)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([0, 80], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }
}
