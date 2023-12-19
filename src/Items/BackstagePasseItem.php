<?php

namespace GildedRose\Items;

class BackstagePasseItem extends BasicItem
{
    const NAME = 'Backstage passes to a TAFKAL80ETC concert';

    protected function updateQuality(): void
    {
        $newQualityValue = match (true) {
            ($this->sellIn <= 0) => 0,
            ($this->sellIn <= 5) => ($this->quality + 3),
            ($this->sellIn <= 10) => ($this->quality + 2),
            default => $this->quality,
        };


        $this->updateIfQualityLimitationPassed($newQualityValue);
    }
}