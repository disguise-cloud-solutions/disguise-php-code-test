<?php

namespace App\ItemsStrategies;

use App\Interfaces\ItemsInterface;
use App\Item;

class BackstagePase implements ItemsInterface
{
    /**
     * @param Item $item
     * @return void
    */
    public function applyDecrement(Item $item) : void
    {
        if ($item->quality < 50) {
            $item->quality = $item->quality + 1;
            if (($item->sellIn < 11) and ($item->quality < 50)) {
                $item->quality = $item->quality + 1;
            }
            if (($item->sellIn < 6) and ($item->quality < 50)) {
                $item->quality = $item->quality + 1;
            }
        }

        $item->sellIn = $item->sellIn - 1;

        if ($item->sellIn < 0) {
            $item->quality = $item->quality - $item->quality;
        }
    }
}
