<?php

use GildedRose\Item;
use PHPUnit\Framework\TestCase;

require_once 'gilded_rose.php';

class GildedRoseTest extends TestCase
{

    public function test_sulfur_is_not_degrading()
    {
        $quality = 80;
        $item = new Item("Sulfuras, Hand of Ragnaros", 1, $quality);
        $gildedRose = $this->makeGildedRoseWithOneItem($item);

        $gildedRose->update_quality();

        $this->assertSame($quality, $item->quality);
    }

    public function test_aged_brie_increases_in_quality_by_1()
    {
        $item = new Item("Aged Brie", 1, 1);
        $gildedRose = $this->makeGildedRoseWithOneItem($item);

        $gildedRose->update_quality();

        $this->assertSame(2, $item->quality);
    }


    public function test_golden_master()
    {
        $goldenFixture = __DIR__ . DIRECTORY_SEPARATOR . 'fixtures/golden.txt';
        ob_start();
        $days = 100;

        $argv = ['command', $days];
        require __DIR__ . '/../src/texttest_fixture.php';

        $output = ob_get_clean();

        $this->assertStringEqualsFile('' . $goldenFixture . '', $output);
    }

    /**
     * @param $item
     * @return GildedRose
     */
    private function makeGildedRoseWithOneItem($item): GildedRose
    {
        $items = array($item);
        $gildedRose = new GildedRose($items);
        return $gildedRose;
    }


}
