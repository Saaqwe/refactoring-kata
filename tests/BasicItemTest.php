<?php

declare(strict_types=1);

namespace Tests;

use GildedRose\GildedRose;
use GildedRose\Item;
use PHPUnit\Framework\TestCase;

class BasicItemTest extends TestCase
{
    public function testUpdate(): void
    {
        $receiveItems = [new Item('Basic item test', 14, 4)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([13, 3], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }

    public function testSellInZeroUpdate(): void
    {
        $receiveItems = [new Item('potion', 0, 18)];
        $gildedRose = new GildedRose($receiveItems);
        $gildedRose->updateQuality();
        $this->assertSame([-1, 16], [$receiveItems[0]->sellIn, $receiveItems[0]->quality]);
    }
}
