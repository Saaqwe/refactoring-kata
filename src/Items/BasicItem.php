<?php

namespace GildedRose\Items;

use GildedRose\Item;

class BasicItem extends GildedRoseItemAbstract
{
    public Item $item;
    protected int $qualityDecreaseSpeed = 1;
    protected int $sellInDecreaseSpeed = 1;
    protected int $qualityMinValue = 0;
    protected int $qualityMaxValue = 50;
    protected int $expiredItemSellInMultiplication = 2;

    const SELL_IN_EXPIRED = 0;

    public function __construct(Item $item)
    {
        $this->name = $item->name;
        $this->sellIn = $item->sellIn;
        $this->quality = $item->quality;
        $this->item = $item;
    }

    protected function updateQuality(): void
    {
        if ($this->sellIn <= self::SELL_IN_EXPIRED) {
            $this->qualityDecreaseSpeed *= $this->expiredItemSellInMultiplication;
        }

        $newQualityValue = $this->quality - $this->qualityDecreaseSpeed;
        $this->updateIfQualityLimitationPassed($newQualityValue);
    }

    protected function updateIfQualityLimitationPassed(int $newQualityValue): void
    {
        $this->setQuality(match (true) {
            $newQualityValue < $this->qualityMinValue => $this->qualityMinValue,
            $newQualityValue > $this->qualityMaxValue => $this->qualityMaxValue,
            default => $newQualityValue,
        });
    }

    protected function updateSellIn(): void
    {
        $this->setSellIn($this->sellIn - $this->sellInDecreaseSpeed);
    }

    public function setSellIn(int $sellIn)
    {
        $this->sellIn = $sellIn;
        $this->item->sellIn = $sellIn;
    }

    public function setQuality(int $quality)
    {
        $this->quality = $quality;
        $this->item->quality = $quality;
    }
}