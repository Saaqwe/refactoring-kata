<?php

namespace GildedRose\Items;

class AgedBrieItem extends BasicItem
{
    const NAME = 'Aged Brie';

    protected function updateQuality(): void
    {
        $newQualityValue = match (true) {
            ($this->sellIn <= 0) => 0,
            ($this->sellIn <= 5) => ($this->quality + 3),
            ($this->sellIn <= 10) => ($this->quality + 2),
            default => ($this->quality + 1),
        };

        $this->updateIfQualityLimitationPassed($newQualityValue);
    }
}