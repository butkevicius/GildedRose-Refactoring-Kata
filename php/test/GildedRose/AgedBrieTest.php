<?php
/**
 *
 * @author Andrius Butkevicius <andbtk@telesoftas.com>
 */

namespace GildedRose;

use PHPUnit\Framework\TestCase;

class AgedBrieTest extends TestCase
{
    public function test_is_item()
    {
        $anySellInValue = 5;
        $this->assertInstanceOf(Item::class, new AgedBrie(0, $anySellInValue));
    }

    /**
     * @dataProvider qualityAfterOneUpdateProvider
     */
    public function test_increases_in_quality_by_1($initialQuality, $expectedQuality)
    {
        $anySellInValue = 5;
        $item = new AgedBrie($initialQuality, $anySellInValue);

        $item->update();

        $this->assertSame($expectedQuality, $item->getQuality());
    }

    public function test_sell_in_decreases_by_1()
    {
        $expectedSellIn = 5;
        $actualSellIn = 6;
        $item = new AgedBrie(5, $actualSellIn);

        $item->update();

        $this->assertSame($expectedSellIn, $item->getSellIn());
    }


    public function qualityAfterOneUpdateProvider()
    {
        yield [4, 5];
        yield [5, 6];
    }

    public function test_quality_not_increases_when_more_than_49()
    {
        $item = new AgedBrie(50, 0);
        $item->update();
        $this->assertSame(50, $item->getQuality());
    }

    public function test_quality_increases_by_2_when_sellin_less_than_1()
    {
        $item = new AgedBrie(4, 0);

        $item->update();

        $this->assertSame(6, $item->getQuality());
    }
}
