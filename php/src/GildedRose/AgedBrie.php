<?php
/**
 *
 * @author Andrius Butkevicius <andbtk@telesoftas.com>
 */

namespace GildedRose;


class AgedBrie extends Item
{
    /**
     * AgedBrie constructor.
     */
    public function __construct(int $quality, int $sellIn)
    {
        $this->quality = $quality;
        $this->sell_in = $sellIn;
        $this->name = 'Aged Brie';
    }

    public function update(): void
    {
        $upperQualityLimit = 50;

        if ($this->sell_in <= 0) {
            $this->quality += 2;
        } else {
            $this->quality += 1;
        }

        $this->sell_in--;

        if ($this->getQuality() > $upperQualityLimit) {
            $this->quality = $upperQualityLimit;
        }
    }


    public function getQuality()
    {
        return $this->quality;
    }

    public function getSellIn()
    {
        return $this->sell_in;
    }
}