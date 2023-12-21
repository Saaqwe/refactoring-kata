<?php

namespace GildedRose\Items;

use GildedRose\Item;

abstract class GildedRoseItemAbstract extends Item
{
    protected int $qualityDecreaseSpeed;
    protected int $sellInDecreaseSpeed;
    protected int $qualityMinValue;
    protected int $qualityMaxValue;
    protected int $expiredItemSellInMultiplication;


    public function update(): void
    {
        $this->updateQuality();
        $this->updateSellIn();
    }

    abstract protected function updateQuality(): void;

    abstract protected function updateIfQualityLimitationPassed(int $newQualityValue): void;

    abstract protected function updateSellIn(): void;
}