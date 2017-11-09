<?php
/**
 *
 * @author Andrius Butkevicius <andbtk@telesoftas.com>
 */

namespace GildedRose;

use PHPUnit\Framework\TestCase;

class BackstagePassTest extends TestCase
{

    public function test_quality_increases_by_1()
    {
        $expected = 5;
        $pass = new BackstagePass(4, 20);

        $pass->update();

        $this->assertSame($expected, $pass->getQuality());
    }

    public function test_quality_increases_by_2_when_10_days_or_less()
    {
        $expected = 10;
        $pass = new BackstagePass(8, 10);

        $pass->update();

        $this->assertSame($expected, $pass->getQuality());
    }


    public function test_quality_increases_by_3_when_5_days_or_less()
    {
        $expected = 10;
        $pass = new BackstagePass(7, 5);

        $pass->update();

        $this->assertSame($expected, $pass->getQuality());
    }

    public function test_quality_zero_after_sell_in_negative()
    {
        $expected = 0;
        $pass = new BackstagePass(7, -1);

        $pass->update();

        $this->assertSame($expected, $pass->getQuality());
    }


    public function test_sell_in_decreases()
    {
        $expected = 0;
        $pass = new BackstagePass(10, 1);

        $pass->update();

        $this->assertSame($expected, $pass->getSellIn());
    }

    public function test_max_quality_50()
    {
        $expected = 50;
        $pass = new BackstagePass(50, 2);

        $pass->update();

        $this->assertSame($expected, $pass->getQuality());
    }

}
