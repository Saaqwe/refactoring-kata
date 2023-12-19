<?php

namespace GildedRose\Items;

use GildedRose\Item;

abstract class GildedRoseItemAbstract extends Item
{
    protected int $qualityDecreaseSpeed;
    protected int $qualityMinValue;
    protected int $qualityMaxValue;

    public function update(): void
    {
        $this->updateQuality();
        $this->update();
    }

    abstract protected function updateQuality(): void;

    abstract protected function updateIfQualityLimitationPassed(int $newQualityValue): void;

    abstract protected function updateSellIn(): void;
}