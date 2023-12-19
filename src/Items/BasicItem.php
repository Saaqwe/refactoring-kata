<?php

namespace GildedRose\Items;

use GildedRose\Item;

class BasicItem extends GildedRoseItemAbstract
{
    public Item $item;
    protected int $qualityDecreaseSpeed = 1;
    protected int $qualityMinValue = 0;
    protected int $qualityMaxValue = 50;

    public function __construct(Item $item)
    {
        $this->name = $item->name;
        $this->sellIn = $item->sellIn;
        $this->quality = $item->quality;
        $this->item = $item;
    }

    public function update(): void
    {
        $this->updateQuality();
        $this->updateSellIn();
    }

    protected function updateQuality(): void
    {
        if ($this->sellIn <= 0) {
            $this->qualityDecreaseSpeed *= 2;
        }

        $newQualityValue = $this->quality - $this->qualityDecreaseSpeed;
        $this->updateIfQualityLimitationPassed($newQualityValue);
    }

    protected function updateIfQualityLimitationPassed(int $newQualityValue): void
    {
        $this->quality = match (true) {
            $newQualityValue < $this->qualityMinValue => $this->qualityMinValue,
            $newQualityValue > $this->qualityMaxValue => $this->qualityMaxValue,
            default => $newQualityValue,
        };
        $this->item->quality = $this->quality;
    }

    protected function updateSellIn(): void
    {
        $this->sellIn -= 1;

        $this->item->sellIn = $this->sellIn;
    }
}