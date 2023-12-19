<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use GildedRose\Items\BackstagePasseItem;
use PHPUnit\Framework\TestCase;

class BackstagePasseTest extends TestCase
{
    public function testFreshUpdate(): void
    {
        $receiveItems = [new Item(BackstagePasseItem::NAME, 14, 4)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([13, 4], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }

    public function testOldUpdate(): void
    {
        $receiveItems = [new Item(BackstagePasseItem::NAME, 9, 8)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([8, 10], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }

    public function testVeryOldUpdate(): void
    {
        $receiveItems = [new Item(BackstagePasseItem::NAME, 4, 18)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([3, 21], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }

    public function testSellInZeroUpdate(): void
    {
        $receiveItems = [new Item(BackstagePasseItem::NAME, 0, 18)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([-1, 0], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }

    public function testMaxQualityUpdate(): void
    {
        $receiveItems = [new Item(BackstagePasseItem::NAME, 3, 49)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([2, 50], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }
}
