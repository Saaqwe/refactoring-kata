<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class AgedBrieItemTest extends TestCase
{
    public function testFreshUpdate(): void
    {
        $receiveItems = [new Item('Aged Brie', 14, 4)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([13, 5], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }

    public function testOldUpdate(): void
    {
        $receiveItems = [new Item('Aged Brie', 9, 8)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([8, 10], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }

    public function testVeryOldUpdate(): void
    {
        $receiveItems = [new Item('Aged Brie', 4, 18)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([3, 21], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }

    public function testSellInZeroUpdate(): void
    {
        $receiveItems = [new Item('Aged Brie', 0, 18)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([-1, 0], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }

    public function testMaxQualityUpdate(): void
    {
        $receiveItems = [new Item('Aged Brie', 3, 49)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([2, 50], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }
}
