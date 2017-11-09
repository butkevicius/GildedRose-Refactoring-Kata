<?php
/**
 *
 * @author Andrius Butkevicius <andbtk@telesoftas.com>
 */

namespace GildedRose;


class BackstagePass extends Item
{

    /**
     * BackstagePass constructor.
     */
    public function __construct(int $quality, int $sellIn)
    {
        parent::__construct('Backstage passes to a TAFKAL80ETC concert', $sellIn, $quality);
    }

    public function update(): void
    {
        $this->quality++;
        if ($this->getSellIn() <= 10) {
            $this->quality++;
        }
        if ($this->getSellIn() <= 5) {
            $this->quality++;
        }
        if ($this->getSellIn() <= 0) {
            $this->quality = 0;
        }
        if ($this->quality > 50) {
            $this->quality = 50;
        }
        $this->sell_in--;
    }


}